const expirationTime = 25;
const currentTime = Date.now();
const expiration = currentTime + expirationTime * 60000;
const storedExpiration = sessionStorage.getItem(book_id + "_expiration");
console.log(book_id + "_catalog");
if (storedExpiration && currentTime < storedExpiration) {
    const catalog = JSON.parse(sessionStorage.getItem(book_id + "_catalog"));
    setCatalog2HTML(cweb, catalog, chapter_id)
}
else {
    console.log("The stored catalog has expired");
}


async function loadCatalog(cweb, book_id, chapter_id) {
    const res_catatog = await fetch(`/site/${cweb}/${book_id}/api/catalog`)
    const chapter_infoCatatog = await res_catatog.json();
    sessionStorage.setItem(book_id + "_expiration", expiration);
    sessionStorage.setItem(book_id + "_catalog", JSON.stringify(chapter_infoCatatog));
    setCatalog2HTML(cweb, chapter_infoCatatog, chapter_id)
}


function setCatalog2HTML(cweb, chapter_infoCatatog, chapter_id) {
    let dataCatalog = [];

    chapter_infoCatatog.data.item_list.forEach((e, index) => {
        let linkchap = `/site/${cweb}/${book_id}/${e.url}`;
        dataCatalog.push(e.url.toString())
        $("#selectList").append(new Option(e.name, linkchap));
    });
    let current_index = dataCatalog.indexOf(chapter_id.toString());
    $("#selectList").val(chapter_id);
    document.getElementById("selectList").selectedIndex = current_index;
    $("#prev-chap").attr("href", `/site/${cweb}/${book_id}/${dataCatalog[current_index - 1]}`).toggle(current_index > 0);
    $("#next-chap").attr("href", `/site/${cweb}/${book_id}/${dataCatalog[current_index + 1]}`).toggle(current_index < dataCatalog.length - 1);
    $("#mucluc1").remove();
    $("#mucluc2").show();
}

document.addEventListener("keydown", function (event) {
    if (event.key === "j" && document.getElementById("prev-chap")) {
        document.getElementById("prev-chap").click();
    } else if (event.key === "k" && document.getElementById("next-chap")) {
        document.getElementById("next-chap").click();
    }
});

const removeEmptyLines = str => str.split(/\r?\n/).filter(line => line.trim() !== '').join('\n');


function CopyToClipboard(containerid = "noidung") {
    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");
    }
    else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("copy");
        alert("Copied successfully")
    }
}
