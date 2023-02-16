<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css" rel="stylesheet">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .container {
            height: 100vh;
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
            background-color: #fcfcfc;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
            width: 600px;
            height: 260px;
            background-color: #ffffff;
            padding: 10px 30px 40px;
        }

        .card h3 {
            font-size: 22px;
            font-weight: 600;

        }

        .drop_box {
            margin: 10px 0;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 3px dotted #a3a3a3;
            border-radius: 5px;
        }

        .drop_box h4 {
            font-size: 16px;
            font-weight: 400;
            color: #2e2e2e;
        }

        .drop_box p {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #a3a3a3;
        }

        .btn {
            text-decoration: none;
            background-color: #005af0;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            outline: none;
            transition: 0.3s;
        }

        .btn:hover {
            text-decoration: none;
            background-color: #ffffff;
            color: #005af0;
            padding: 10px 20px;
            border: none;
            outline: 1px solid #010101;
        }

        .form input {
            margin: 10px 0;
            width: 100%;
            background-color: #e2e2e2;
            border: none;
            outline: none;
            padding: 12px 20px;
            border-radius: 4px;
        }

        h1 {
            color: green;
        }

        /* column pic */
        .column {
            border: 1px solid;
            margin: 10px 0;
        }

        /* Style the images of gallery */
        .column img {
            border: 1px solid #000;
            cursor: zoom-in;
            padding: 5px;
        }

        .column img:hover {
            border-color: red;
            transform: scale(1.1);
            transition: 0.5s;
        }

        .column img:active {
            border-color: red;
        }

        * {
            box-sizing: border-box;
        }

        /* Expanding image text */
        #geeks {
            position: absolute;
            left: 200px;
            padding-top: 100px;
            font-size: 28px;
            color: #EFECE9;
        }

        #geeks:hover {
            color: #ADE3BD;
            cursor: wait;
        }



        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
            width: 100px;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row {
            overflow: auto;
            height: 100vh;
            min-width: 120px;
            margin: 10px;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .container2 {
            display: flex;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }
    </style>

</head>

<body>


    <div class="container2" style="display:none;">
        <div style="width: 55%;display:flex;background: #efefef;padding-right: 2%;">
            <div class="row" id="imageAppend">

            </div>
            <div>
                <img id="expandedImg" style="width:100%;max-height:100vh">
            </div>
        </div>
        <div style="width:40%;margin: 0 auto;height: 100vh;overflow: auto;">

            <form onsubmit="handleSubmit(event)" id="myForm">
                <div
                    style="margin: 10px auto;
                    text-align: center;background: #fff;
                    position: fixed;">
                    <button type="button" class="btn" id="decrease">-</button>
                    <input style="width: 50px;
                    padding: 5px;
                    font-size: 16px;"
                        id="data_value" type="text" value="1" disabled />
                    <button type="button" class="btn" id="increase">+</button>
                </div>
                <div style="padding-top: 50px;"></div>
                <input type="hidden" name="selected_image" id="selected_image">
                <input type="hidden" name="selected_page" id="selected_page">
                <input type="hidden" name="filename" id="filename">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div id="multiForm">
                    <div class='uk-width-1-1@s'
                        style="border: 1px solid #f2f2f2;
                            padding: 10px;
                            border-radius: 5px;
                            margin-top: 15px;">
                        <h2 style="margin:0">Product 1</h2>
                        <div class="uk-width-1-1@s">
                            <label class="uk-form-label" for="product_category">product category</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="product_category" name="product_category[]" type="text"
                                    placeholder="product category">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="product_category_2">product category 2</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="product_category_2" name="product_category_2[]"
                                    type="text" placeholder="product category 2">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="qty">qty</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="qty" type="text" name="qty[]" placeholder="qty">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="unit_price">unit price</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="unit_price" name="unit_price[]" type="text"
                                    placeholder="unit price">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="position">position</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="position" name="position[]" type="text"
                                    placeholder="position">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="art_nr">art nr</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="art_nr" name="art_nr[]" type="text"
                                    placeholder="art nr">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="qty_unit">qty unit</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="qty_unit" name="qty_unit[]" type="text"
                                    placeholder="qty unit">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="total_price">total price</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="total_price" name="total_price[]" type="text"
                                    placeholder="total price">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="description">description</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea" name="description[]" id="description"></textarea>
                            </div>
                        </div>

                    </div>

                </div>
                <button type="submit" class="btn" style="margin: 20px 0;width: 200px;"> Save</button>
            </form>
            <h1 id="DoneFormId" style="color:green;display:none">Done</h1>
        </div>

    </div>

    <div class="container">
        <div class="card">
            <h3>Upload Files</h3>
            <div class="drop_box">
                <header>
                    <h4>Select File here</h4>
                </header>
                <p>Files Supported: PDF</p>
                <input type="file" hidden accept=".pdf" id="fileID" style="display:none;">
                <button class="btn">Choose File</button>
            </div>

        </div>
    </div>

    <div id="canvas" style="display:none;"></div>


    <script type="text/javascript" src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
        document.getElementById('decrease').addEventListener('click', decrease)
        document.getElementById('increase').addEventListener('click', increase)
        var countFormValue = document.getElementById('data_value');
        var multiForm = document.getElementById('multiForm');

        function htmlFormEle(countNumber) {
            return ` <div class='uk-width-1-1@s'
                                style="border: 1px solid #f2f2f2;
                                padding: 10px;
                                border-radius: 5px;
                                margin-top: 15px;">
                                <h2 style="margin:0">Product ${countNumber}</h2>
                                <div class="uk-width-1-1@s">
                                    <label class="uk-form-label" for="product_category">product category</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="product_category" name="product_category[]" type="text"
                                            placeholder="product category">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="product_category_2">product category 2</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="product_category_2" name="product_category_2[]" type="text"
                                            placeholder="product category 2">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="qty">qty</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="qty" type="text" name="qty[]" placeholder="qty">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="unit_price">unit price</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="unit_price" name="unit_price[]" type="text"
                                            placeholder="unit price">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="position">position</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="position" name="position[]" type="text"
                                            placeholder="position">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="art_nr">art nr</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="art_nr" name="art_nr[]" type="text"
                                            placeholder="art nr">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="qty_unit">qty unit</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="qty_unit" name="qty_unit[]" type="text"
                                            placeholder="qty unit">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="total_price">total price</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-input" id="total_price" name="total_price[]" type="text"
                                            placeholder="total price">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <label class="uk-form-label" for="description">description</label>
                                    <div class="uk-form-controls">
                                        <textarea class="uk-textarea" name="description[]" id="description"></textarea>
                                    </div>
                                </div>

                            </div>`;
        }

        function decrease() {
            let value = countFormValue.value;
            if (value > 1) {
                value--;
                countFormValue.value = value;
                multiForm.removeChild(multiForm.lastElementChild);
            }

        }

        function increase() {
            let value = countFormValue.value;
            if (value < 100) {
                value++;
                countFormValue.value = value;
                var tmp = document.createElement('div');
                tmp.innerHTML = htmlFormEle(value);
                while (tmp.firstChild) {
                    multiForm.appendChild(tmp.firstChild);
                }

            }

        }




        var formSaveDone = [];
        var container2 = document.querySelector('.container2')
        var container = document.querySelector('.container');

        const dropArea = document.querySelector(".drop_box"),
            button = dropArea.querySelector("button"),
            dragText = dropArea.querySelector("header"),
            input = dropArea.querySelector("input");
        let file;
        var filename;

        button.onclick = () => {
            input.click();
        };

        input.addEventListener("change", function(e) {
            fileName = e.target.files[0].name;
            var src = URL.createObjectURL(e.target.files[0])
            let filedata = `
            
            <h4>${fileName}</h4>
            <button class="btn" onclick="pdfToimage('${src}')">Upload</button>
        `;
            dropArea.innerHTML = filedata;
        });

        function myFunction(imgs, page) {
            var nodeList = document.querySelectorAll('img');
            for (let i = 0; i < nodeList.length; i++) {
                nodeList[i].style.border = '1px solid #000';
            }
            imgs.style.border = '2px solid red';
            //   console.log('page: ' + page)
            var expandImg = document.getElementById("expandedImg");
            expandImg.src = imgs.src;
            expandImg.parentElement.style.display = "block";
            // console.log(formSaveDone.find(v => v == page))
            if (formSaveDone.find(v => v == page)) {
                document.getElementById("myForm").style.display = 'none';
                document.getElementById('DoneFormId').style.display = 'block';
            } else {
                document.getElementById("myForm").style.display = 'block';
                document.getElementById('DoneFormId').style.display = 'none';
                document.getElementById("myForm").reset();
                multiForm.innerHTML = htmlFormEle(1);
                countFormValue.value = 1;
                document.getElementById('selected_image').value = imgs.src
                document.getElementById('selected_page').value = page
                document.getElementById('filename').value = filename
            }


        }


        function pdfToimage(url) {
            dropArea.innerHTML = `<h4>Loading...</h4>`;
            var canvasdiv = document.getElementById('canvas');
            var canvas = document.createElement('canvas');
            canvasdiv.appendChild(canvas);

            //var url = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf';

            var PDFJS = window['pdfjs-dist/build/pdf'];

            PDFJS.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

            var loadingTask = PDFJS.getDocument(url);

            loadingTask.promise.then(function(pdf) {

                var canvasdiv = document.getElementById('canvas');
                var totalPages = pdf.numPages
                var data = [];

                for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
                    pdf.getPage(pageNumber).then(function(page) {

                        // page.getTextContent().then(function(textContent) {
                        //     console.log(textContent)
                        // });

                        var scale = 1.5;
                        var viewport = page.getViewport({
                            scale: scale
                        });

                        var canvas = document.createElement('canvas');
                        canvasdiv.appendChild(canvas);

                        // Prepare canvas using PDF page dimensions
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };



                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function() {
                            data.push(canvas.toDataURL('image/png'))
                            // console.log(data.length + ' page(s) loaded in data');
                            dropArea.innerHTML =
                                `<h4>Loading... ${totalPages} Of ${data.length}</h4>`;
                            var appenimage = document.getElementById('imageAppend');
                            const div = document.createElement("div");
                            div.className = "column";

                            const img = document.createElement("img");
                            img.src = canvas.toDataURL('image/png');
                            img.onclick = function() {
                                myFunction(this, pageNumber);
                            };

                            div.appendChild(img);

                            appenimage.appendChild(div)
                            if (data.length == totalPages) {
                                // console.log(data);
                                dropArea.innerHTML = `<h4>Done</h4>`;
                                var expandImg = document.getElementById("expandedImg");
                                expandImg.src = data[0];
                                document.getElementById('selected_image').value = data[0];
                                document.getElementById('selected_page').value = 1
                                document.getElementById('filename').value = filename
                                document.querySelectorAll('img')[0].style.border = '1px solid #000';
                                expandImg.parentElement.style.display = "block";
                                container2.style.display = 'flex'
                                container.style.display = 'none'
                            }
                        });
                    });
                }



            }, function(reason) {
                // PDF loading error
                console.error(reason);
            });
        }



        async function handleSubmit(event) {
            event.preventDefault();
            let res = await fetch("/savedata", {
                headers: {
                    "X-CSRF-Token": document.querySelector('input[name="_token"]').value
                },
                method: "post",
                credentials: "same-origin",
                body: new URLSearchParams(new FormData(event.target))
            })
            // console.log(res)
            let data = await res.json();
            //  console.log(data)
            formSaveDone.push(data.selected_page);
            document.getElementById("myForm").style.display = 'none';
            document.getElementById('DoneFormId').style.display = 'block';
        }
    </script>

</body>

</html>
