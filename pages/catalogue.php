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


    <ul class="paging"><li><span>First</span></li><li><span>Previous</span></li><li><a href="/?page=catalogue&category=3&amp;pg=2">Next</a></li><li><span>Last</span><li></ul>

    </div>
    <div class="cl">&#160;</div>


<?php require_once ("_footer.php"); ?>