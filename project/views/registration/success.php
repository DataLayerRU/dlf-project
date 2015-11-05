<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?= $title ?></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
        <div id="wrapper">

            <div id="header">
                <div id="menu">
                    <ul>
                        <?php if (\dlf\basic\Application::$instance->getComponent('auth')->isAuthorized()): ?>
                            <li>
                                <a href="/">Здравствуйте, <?= \dlf\basic\Application::$instance->getComponent('auth')->getIdentity()->getAttribute('username') ?></a>
                            </li>
                            <li><a href="/post/create">Добавить запись</a></li>
                            <li><a href="/logout">Выход</a></li>
                        <?php else: ?>
                            <li><a href="/login">Войти</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- end #menu -->
                <div id="search">
                    <form method="get" action="">
                        <fieldset>
                            <input type="text" name="s" id="search-text" size="15" />
                            <input type="submit" id="search-submit" value="Search" />
                        </fieldset>
                    </form>
                </div>
                <!-- end #search -->
            </div>
            <!-- end #header -->
            <div id="logo">
                <h1><a href="#">Blogging </a></h1>
                <p><em> template design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></em></p>
            </div>
            <hr />
            <!-- end #logo -->
            <!-- end #header-wrapper -->

            <div id="page">
                <div id="content">
                    Регистрация успешна.
                </div>
                <!-- end #content -->
                <div id="sidebar">
                    <ul>
                        <li id="calendar">
                            <h2>Calendar</h2>
                            <div id="calendar_wrap">
                                <table summary="Calendar">
                                    <caption>
                                        March 2008
                                    </caption>
                                    <thead>
                                        <tr>
                                            <th abbr="Monday" scope="col" title="Monday">M</th>
                                            <th abbr="Tuesday" scope="col" title="Tuesday">T</th>
                                            <th abbr="Wednesday" scope="col" title="Wednesday">W</th>
                                            <th abbr="Thursday" scope="col" title="Thursday">T</th>
                                            <th abbr="Friday" scope="col" title="Friday">F</th>
                                            <th abbr="Saturday" scope="col" title="Saturday">S</th>
                                            <th abbr="Sunday" scope="col" title="Sunday">S</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <td abbr="February" colspan="3" id="prev"><a href="#" title="">&laquo; Feb</a></td>
                                            <td class="pad">&nbsp;</td>
                                            <td abbr="April" colspan="3" id="next"><a href="#" title="">Apr &raquo;</a></td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td colspan="5" class="pad">&nbsp;</td>
                                            <td>1</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td id="today">11</td>
                                            <td>12</td>
                                            <td>13</td>
                                            <td>14</td>
                                            <td>15</td>
                                            <td>16</td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                            <td>20</td>
                                            <td>21</td>
                                            <td>22</td>
                                            <td>23</td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>25</td>
                                            <td>26</td>
                                            <td>27</td>
                                            <td>28</td>
                                            <td>29</td>
                                            <td>30</td>
                                        </tr>
                                        <tr>
                                            <td>31</td>
                                            <td class="pad" colspan="6">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- end #sidebar -->
                <div style="clear: both;">&nbsp;</div>
            </div>
            <!-- end #page -->

            <div id="footer">
                <p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
            </div>
            <!-- end #footer -->
        </div>
        <div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
