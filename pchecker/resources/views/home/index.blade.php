<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>PChecker-装配式建筑指标评审平台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/plugins/webuploader/webuploader.css">
    <link rel="stylesheet" type="text/css" href="css/demo/webuploader-demo.css">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h2>
                            欢迎来到装配式建筑指标评审系统
                            <a href="/home/login" id="a" class="btn btn-primary btn-lg" onclick="login()">登录</a>
                        </h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <h2>
                               装配式建筑指标评审系统
                            </h2>
                        <p>
                            WebUploader是由Baidu WebFE(FEX)团队开发的一个简单的以HTML5为主，FLASH为辅的现代文件上传组件。在现代的浏览器里面能充分发挥HTML5的优势，同时又不摒弃主流IE浏览器，沿用原来的FLASH运行时，兼容IE6+，iOS 6+, android 4+。两套运行时，同样的调用方式，可供用户任意选用。 采用大文件分片并发上传，极大的提高了文件上传效率。
                        </p>                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                   
                    <div class="ibox-content">
                        <div class="page-container">
                            <p>模型上传可以上传skp,dwg,3dm等格式！</p>
                            <div id="uploader" class="wu-example">
                                <div class="queueList">
                                    <div id="dndArea" class="placeholder">
                                        <div id="filePicker"></div>
                                        <p>或将文件拖拽到该区域内！</p>
                                    </div>
                                </div>
                                <div class="statusBar" style="display:none;">
                                    <div class="progress">
                                        <span class="text">0%</span>
                                        <span class="percentage"></span>
                                    </div>
                                    <div class="info"></div>
                                    <div class="btns">
                                        <div id="filePicker2"></div>
                                        <div class="uploadBtn">开始上传</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="js/content.js?v=1.0.0"></script>


    <!-- Web Uploader -->
    <script type="text/javascript">
        // 添加全局站点信息
        var BASE_URL = 'js/plugins/webuploader';
    </script>
    <script src="js/plugins/webuploader/webuploader.min.js"></script>

    <script src="js/demo/webuploader-demo.js"></script>
    <script src="/js/vue.js"></script>

    <script>
        function login(){


            // document.cookie = "";
        }

    </script>
    
    

</body>

</html>
