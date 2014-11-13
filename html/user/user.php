<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    <script src="../../external/js/jquery-1.11.1.min.js"></script>
    <script src="../../external/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../external/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/origin.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <?
        require("../../lib/php/pagepart/topbar.php");
    ?>
    <div class="container">
        <?php
            require("../../lib/php/pagepart/header.php");
        ?>
        <div id="content" class="snippet-hidden">
            <div id="mainbar-full" class="user-show-new">
                <div class="subheader">
                    <h1 id="user-displayname"><a href="">ztelur</a></h1>
                    <div class="sub-header-links">
                        <a href="" data-toggle="modal" data-target=".bs-example-modal-lg">edit</a>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">change user information</h4>
                                </div>
                                <div class="modal-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="username">display name</label>
                                        <input type="text" name="username" id="username" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="email" name="email" id="email" placeholder="email">
                                    </div>
                                </form>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <a href="" data-toggle="modal" data-target=".bs-example-modal-lg-changepassword">change password</a>
                        <div class="modal fade bs-example-modal-lg-changepassword" tabindex="-1"
                             role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">change user information</h4>
                                </div>
                                <div class="modal-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label for="oldpassword">current password</label>
                                        <input type="password" name="password" id="password" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword">new password</label>
                                        <input type="password" name="password1" id="newpassword1" placeholder="new password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword2">new password</label>
                                        <input type="password" name="password2" id="newpassword2" placeholder="input again">
                                    </div>
                                </form>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-info-container" style="height: 60px">
                    <div id="small-user-info" class="user-header">
                        <div class="data">
                            <table>
                                <tbody>
                                    <tr>
                                        <td rowspan="2" class="gravator-cell">
                                            <div class="gravator">
                                                <a href="">
                                                    <div><img src="" alt width="42" height="42" class="logo"></div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="reputation">
                                                <span class="reputation-score">6</span>
                                                "repulation"
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>seen</td>
                                        <td class="supernova" title=""><span title="" class="relativetime"></span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div>
                    <div id="user-panel-questions" class="user-panel-left">
                        <div class="subheader">
                            <h1><a><span class="count">2</span>Questions</a></h1>
                        </div>
                        <div class="user-panel-content">

                                <?php
                                    require_once("addquestion.php");
                                ?>
                        </div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-reputation" class="user-panel">
                        <div class="subheader">
                            <h1><a href=""><span class="count">6</span>"Reputation"</a></h1>
                        </div>
                        <div class="user-panel-content"></div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-answers" class="user-panel-left">
                        <div class="subheader">
                            <h1><a><span class="count">0</span> Answers</a></h1>
                        </div>
                        <div class="user-panel-content">
                            <?php
                                require_once("addanswer.php");
                            ?>
                        </div>
                        <div class="user-panel-footer"></div>
                    </div>
                    <div id="user-panel-tags" class="user-panel">
                        <div class="subheader">
                            <h1><a><span class="count">3</span> Tags</a></h1>
                        </div>
                        <div class="user-panel-content">
<!--                            if have tags-->
                            <table class="user-tags">
                                <tbody>
                                <?php
                                    require_once("addtags.php");
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="user-panel-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>