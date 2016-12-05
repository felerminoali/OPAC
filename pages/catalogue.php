<?php
/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/4/2016
 * Time: 8:26 PM
 */

Login::restrictFront();

require_once ("_header.php");
?>

<h1>Catalogue</h1>



    <div class='container'>
        <div class='section friendly'>
<!--            <h1><strong>OPAC | Welcome to your new app!</strong></h1>-->
            <div class='article'>

                <form action="" method="get">
                    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
                        <tr>
                            <th><label for="search">Product:</label></th>
                            <td>
                                <input type="text" name="search" value="" class="fld">
                            </td>
                            <td>
                                <label for="btn_add" class="sbm sbm_blue fl_l">
                                    <input type="submit" id="btn_add" class="btn" value="Search">
                                </label>
                            </td>
                        </tr>
                    </table>

                    <ul style="display:inline">
                        <li><a href="default.asp">Home</a></li>
                        <li><a href="news.asp">News</a></li>
                        <li><a href="contact.asp">Contact</a></li>
                        <li><a href="about.asp">About</a></li>
                    </ul>

                </form>
                
                
<!--                <p>What is Lorem Ipsum?</p>-->
<!--                <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.-->
<!--                </p>-->
<!--                <p>Refer to the <a href="https://myopac.herokuapp.com/?page=about">link</a> if you need more info.</p>-->
            </div>
        </div>
    </div>


<?php require_once ("_footer.php"); ?>