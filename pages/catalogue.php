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

    <h1>Catalogue:: Art & Architecture</h1>



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

                    <ul id="filters">
                        <li>
<!--                            <div class="tickbox">-->
                                <input type="checkbox" name="YearCheckFilter"
                                       id=""
                                       value=""
                                />
                                <span> Books </span>
<!--                            </div>-->
                        </li>
                        <li>
<!--                            <div class="tickbox">-->
                                <input type="checkbox" name="YearCheckFilter"
                                       id=""
                                       value=""
                                />
                                <span> Audio / Video </span>
<!--                            </div>-->
                        </li>
                        <li>
<!--                            <div class="tickbox">-->
                                <input type="checkbox" name="YearCheckFilter"
                                       id=""
                                       value=""
                                />
                                <span> Periodicals </span>
<!--                            </div>-->
                        </li>
                    </ul>

                </form>
                
                
<!--                <p>What is Lorem Ipsum?</p>-->
<!--                <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.-->
<!--                </p>-->
<!--                <p>Refer to the <a href="https://myopac.herokuapp.com/?page=about">link</a> if you need more info.</p>-->
            </div>
        </div>
    </div>




    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=31">
                <img src="media/catalogue/unavailable.png" alt="Drum" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=31"></a>
                Drum                        </h4>
            <h4>
                Price: &pound145.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="31_1">Add to basket</a> </p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=12">
                <img src="media/catalogue/bag1.png" alt="Bag" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=12"></a>
                Bag                        </h4>
            <h4>
                Price: &pound120.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="12_1">Add to basket</a> </p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=11">
                <img src="media/catalogue/acad.png" alt="Auto Desk AutoCad" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=11"></a>
                Auto Desk AutoCad                        </h4>
            <h4>
                Price: &pound554.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="11_1">Add to basket</a> </p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=10">
                <img src="media/catalogue/3D_printer2.png" alt="3D printer" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=10"></a>
                3D printer                        </h4>
            <h4>
                Price: &pound600.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="10_1">Add to basket</a> </p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=9">
                <img src="media/catalogue/guitar2.png" alt="Guitar Acustic" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=9"></a>
                Guitar Acustic                        </h4>
            <h4>
                Price: &pound400.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="9_1">Add to basket</a> </p>
        </div>
    </div>
    <div class="catalogue_wrapper">
        <div class="catalogue_wrapper_left">

            <a href="/?page=catalogue-item&amp;category=3&amp;id=8">
                <img src="media/catalogue/Tambourine1.png" alt="Tambourine" width="120" />
            </a>
        </div>
        <div class="catalogue_wrapper_right">
            <h4>
                <a href="/?page=catalogue-item&amp;category=3&amp;id=8"></a>
                Tambourine                        </h4>
            <h4>
                Price: &pound127.00;
            </h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since&hellip;</p>
            <p><a href="#" class="add_to_basket" rel="8_1">Add to basket</a> </p>
        </div>
    </div>
    <ul class="paging"><li><span>First</span></li><li><span>Previous</span></li><li><a href="/?page=catalogue&category=3&amp;pg=2">Next</a></li><li><span>Last</span><li></ul>

    </div>
    <div class="cl">&#160;</div>


<?php require_once ("_footer.php"); ?>