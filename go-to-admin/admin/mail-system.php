<?php
//session_start();
//error_reporting(0);
include('includes/header.php');
// include('includes/navbar.php');
include('db.php');
?>
<?php
$user = 'root';
$password = '';
$db = 'placement_assistant';
$host = 'localhost';
?>

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <span class="mask bg-gradient-default opacity-8"></span>

    <div class="card shadow">
        <h1>Email The Students</h1>
        <h3> Which have applied to</h3>
        <form action="./mail-test.php" method="POST">
            <div class="input-box">

                <input name="company-ref" list=text_editors style="display: inline;"></input>
                <button class="dropdown">▼</button>
                <datalist id="text_editors">
                    <select multiple size=8>
                        <?php
                        $conn = mysqli_connect($host, $user, $password, $db);
                        $sql = "SELECT Ref_no , Company_name FROM company_module";
                        $result = $conn->query($sql);
                        foreach ($result as $row) {
                            $key = $row['Ref_no'];
                            $val = $row['Company_name'];
                            echo "<option value=$key>$val</option>";
                        }
                        $conn->close();
                        ?>

                        <!-- // <option value="Atom">Atom
                    // <option value="Brackets">Brackets
                    // <option value="Notepad ++">Notepad ++
                    // <option value="Notepad">Notepad
                    // <option value="Sublime Text">Sublime Text
                    // <option value="TextEdit">TextEdit
                    // <option value="TextMate">TextMate
                    // <option value="Wordpad">Wordpad -->
                    </select>
                </datalist>

            </div>


            <br><br>
            <h3 style="display: inline; padding-right: 10px">Mail Title</h3>
            <input name="mail-title"></input>
            <br><br>



            <textarea id="basic-example" name="mail-body">
                <p style="text-align: center">
                    <img title="TinyMCE Logo" src="//www.tiny.cloud/images/glyph-tinymce@2x.png" alt="TinyMCE Logo" width="110" height="97" />
                </p>

                <h2 style="text-align: center;">Welcome to the TinyMCE editor demo!</h2>
            </textarea>
            <input type="submit" name='submit'>Send Mail</input>
        </form>
    </div>
</div>

<script>
    tinymce.init({
        selector: 'textarea#basic-example',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });



    button = document.querySelector('button');
    datalist = document.querySelector('datalist');
    select = document.querySelector('select');
    options = select.options;

    /* on arrow button click, show/hide the DDL*/
    button.addEventListener('click', toggle_ddl);

    function toggle_ddl() {
        if (datalist.style.display === '') {
            datalist.style.display = 'block';
            this.textContent = "▲";
            /* If input already has a value, select that option from DDL */
            var val = input.value;
            for (var i = 0; i < options.length; i++) {
                if (options[i].text === val) {
                    select.selectedIndex = i;
                    break;
                }
            }
        } else hide_select();
    }

    /* when user selects an option from DDL, write it to text field */
    select.addEventListener('change', fill_input);

    function fill_input() {
        input.value = options[this.selectedIndex].value;
        hide_select();
    }

    /* when user wants to type in text field, hide DDL */
    input = document.querySelector('input');
    input.addEventListener('focus', hide_select);

    function hide_select() {
        datalist.style.display = '';
        button.textContent = "▼";
    }
</script>


<style>
    .input-box {
        align-content: center;
        margin: auto;
        width: 50%;
    }



    input,
    /* button {
        font-family: palatino;
        font-size: 12pt;
        padding: 2px;
    } */

    input {
        width: 250px;
        height: 30px;
        padding: 3px;
        border: 1px solid #DDE1E4;
        margin-right: 5px;
    }

    select {
        width: 258px;
        position: relative;
        left: -2px;
        margin: 0;
        border: 1px solid #DDE1E4;
        border-top: none;
        font-size: 9pt;
    }

    datalist {
        display: none;
    }

    option {
        padding: 3px;
    }

    option:hover {
        background-color: #11E8EA;
    }

    .dropdown {
        width: 30px;
        height: 38px;
        position: relative;
        left: -5px;
        border: 1px solid #DDE1E4;
        border-left: none;
        background-color: #11E8EA;
        cursor: pointer;
    }

    h4 {
        text-align: center;
    }


    /* to hide datalist arrow in webkit */

    input::-webkit-calendar-picker-indicator {
        display: none;
    }

    .footer {
        padding-left: 10px;
        padding-right: 10px;
    }

    .shadow {
        align-content: center;
        margin: auto;
        width: 50%;
        padding: 20px;
        float: left;
    }
</style>
<?php
include('includes/script.php');
include('includes/footer.php');
?>