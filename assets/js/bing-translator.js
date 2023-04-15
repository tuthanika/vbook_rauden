
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

async function translateBing2(text) {
    const translate_to = Cookies.get('translator_bing');
    const auth_res = await fetch("https://edge.microsoft.com/translate/auth");
    if (auth_res.ok) {
        const accessToken = await auth_res.text();
        const url1 = `https://api.cognitive.microsofttranslator.com/translate?from=&to=${translate_to}&api-version=3.0&textType=html&includeSentenceLength=true`;
        const settings = {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify([{
                'Text': text
            }])
        };
        const response = await fetch(url1, settings);
        if (response.ok) {
            const data = await response.json();
            const translation = data[0].translations[0].text;
            return translation;
        }
    }
    throw new Error('Failed to translate text.');
}


async function dichThongTinTruyen() {
    const { nodes, texts } = scan_nodes(document)

    const data = await translateBing2(texts.join('\n'))
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