<?php include("inc/head.php");
echo '<title>Bookshelf</title>';
include("inc/header.php");
include $_SERVER['DOCUMENT_ROOT']."/search_widget_index.php";


?>


<div class="card fluid center div_color_yellow1">
    <h3><i class="fa fa-book" aria-hidden="true"></i> Novels <b>(<span id="total_book">0</span>)</b></h3>
</div>
<div class="row center" id="search_result_book">
</div>


<div class="card fluid center div_color_yellow1">
    <h3><i class="fa fa-hdd-o" aria-hidden="true"></i> Backup & restore</h3>
</div>

<div class="row center">

    <div class="card fluid">
        <div class="section dark">
            <h3>Novels</h3>
            <p><button class="inverse" onclick="exportBookmark()"><i class="fa fa-cloud-download"
                        aria-hidden="true"></i> Backup</button>|<button class="inverse" onclick="importBookmark()"><i
                        class="fa fa-cloud-upload" aria-hidden="true"></i> Restore</button< /p>

        </div>
    </div>


</div>


<input type="file" style="display:none" id="inputfile_book" accept=".txt">
<input type="file" style="display:none" id="inputfile_booklist" accept=".txt">

<script>

    let book_mark = [];
    if (localStorage.getItem('book_mark')) {
        book_mark = JSON.parse(localStorage.getItem('book_mark'));
        console.log(book_mark)
        document.getElementById("total_book").innerHTML = book_mark.length;

        book_mark.forEach(e => {
            $("#search_result_book").append(`
            <div class="col-sm-6 col-md-3">
            <div class="card fluid">
                <div class="section" id="book_${btoa(e.id)}" style="height: 340px;">
                <a href="${e.id}" title="${e.name}">
                    <img style="border: 1px ridge black; height:65%;" src="${e.cover}"/>
                </a>
                <h5>
                    <a class="book_title_search" href="${e.id}" title="${e.name}">
                    ${e.name}
                    </a>
                </h5>
                <p>
                    <button class="secondary" onclick="delBookmark('${btoa(e.id)}')">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </p>
                </div>
            </div>
            </div>
        `);
        });




    }





    function delBookmark(book_id) {
        var removeByAttr = function (r, e, t) { for (var n = r.length; n--;)r[n] && r[n].hasOwnProperty(e) && 2 < arguments.length && r[n][e] === t && r.splice(n, 1); return r };
        removeByAttr(book_mark, 'id', atob(book_id.toString()))
        console.log("#book_" + book_id)
        document.getElementById("book_" + book_id).remove();
        var json_str = JSON.stringify(book_mark);
        localStorage.setItem('book_mark', json_str)
        alert("Removed #" + book_id + "!")

    }


    function downloadString(text, fileType, fileName) {
        var blob = new Blob([text], { type: fileType });
        var a = document.createElement('a');
        a.download = fileName;
        a.href = URL.createObjectURL(blob);
        a.dataset.downloadurl = [fileType, a.download, a.href].join(':');
        a.style.display = "none";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        setTimeout(function () { URL.revokeObjectURL(a.href); }, 1500);
    }

    function exportBookmark() {
        var json_str = JSON.stringify(book_mark);
        var encodedString = btoa(encodeURIComponent(json_str));
        downloadString(encodedString, "txt", "f_bookmark")

    }



    function importBookmark() {
        document.querySelector("#inputfile_book").click();
        document.getElementById('inputfile_book')
            .addEventListener('change', function () {

                var fr = new FileReader();
                fr.onload = function () {
                    let decode_text = decodeURIComponent(atob(fr.result));
                    localStorage.setItem('book_mark', decode_text)
                    alert("Successful!")
                    location.reload();
                }

                fr.readAsText(this.files[0]);
            })
    }



</script>



<?php include("inc/footer.php"); ?>