
const whilelist = ['UL', 'OL', 'LI', 'DIV', 'P']
const blacklist = ['svg', 'SCRIPT', 'STYLE']

function scan_nodes(document, target = document.body) {
    let nodes = []
    let texts = []

    const walker = document.createTreeWalker(target, NodeFilter.SHOW_TEXT, null)

    var node
    while ((node = walker.nextNode())) {
        if (blacklist.includes(node.parentNode.nodeName)) continue

        const text = node.textContent.trim()
        if (!text.match(/\p{Script=Han}/u)) continue

        texts.push(text.replaceAll('\n', ' \t·\t'))
        nodes.push(node)
    }

    return { nodes, texts }
}
async function translateLingvanex(input_text) {
    let translate_to = Cookies.get('translator_lingvanex');
    var t = {
      source: "zh-Hans",
      target: translate_to,
      q: input_text
    };
    const a = await fetch("https://mimir.vivaldi.com/translate", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(t)
    });
    if (a.ok) {
        const response = await a.json();
        return response.translatedText;
    } else {
        throw new Error('Unable to translate text.');
    }
}


async function dichThongTinTruyen() {
    const { nodes, texts } = scan_nodes(document)

    const data = await translateLingvanex(texts.join('\n'))
    const lines = data.split('\n')

    lines.forEach((line, idx) => {
        const node = nodes[idx]
        if (!node) return

        node.textContent = line.replaceAll('·\t', '\n')
        const parent = node.parentNode

        if (whilelist.includes(parent.nodeName)) {
        }
    })
}