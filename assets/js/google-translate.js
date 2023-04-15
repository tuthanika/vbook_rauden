function splitText(n, t) { n = n.split("\n").filter(Boolean).join("\n"); const e = []; let l = 0; for (; l < n.length;)e.push(n.slice(l, l + t)), l += t; return e }

async function translateGoogle(text_input) {
  const max_length = 1700;
  let translate_to = Cookies.get("translator_google");
  let output_text = "";
  const arr_text_output = splitText(text_input, max_length);
  const translations = arr_text_output.map(async (phra) => {
    const input_value_q = encodeURIComponent(phra);
    const response = await fetch(
      `https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=${translate_to}&dt=t&q=${input_value_q}`
    );
    const data = await response.json();
    return data[0].map((element) => element[0]).join("");
  });
  const results = await Promise.all(translations);
  translation = results.join("");
  return translation;
}



const whilelist = ["UL", "OL", "LI", "DIV", "P"]
const blacklist = ["svg", "SCRIPT", "STYLE"]

function scan_nodes(document, target = document.body) {
    let nodes = []
    let texts = []

    const walker = document.createTreeWalker(target, NodeFilter.SHOW_TEXT, null)

    var node
    while ((node = walker.nextNode())) {
        if (blacklist.includes(node.parentNode.nodeName)) continue

        const text = node.textContent.trim()
        if (!text.match(/\p{Script=Han}/u)) continue

        texts.push(text.replaceAll("\n", " \t·\t"))
        nodes.push(node)
    }

    return { nodes, texts }
}



async function dichThongTinTruyen() {
    const { nodes, texts } = scan_nodes(document)

    const data = await translateGoogle(texts.join("\n"))
    const lines = data.split("\n")

    lines.forEach((line, idx) => {
        const node = nodes[idx]
        if (!node) return

        node.textContent = line.replaceAll("·\t", "\n")
        const parent = node.parentNode

        if (whilelist.includes(parent.nodeName)) {
        }
    })
}

