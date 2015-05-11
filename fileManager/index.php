<?php header("Content-type:text/html;charset=utf-8");
require_once('dir.func.php');
require_once('file.func.php');
$path = "file";
$info = readDirectory($path);
//print_r($info);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Title</title>
	<link rel="stylesheet" type="text/css" href="cikonss.css">
	<style type="text/css">
		body,p,div,ul,ol,table,dl,dd,dt{
			margin:0;
			padding:0;
		}
		a{
			text-decoration:none;
		}
		ul,li{
			list-style:none;
			float:left;
		}
		#top {
			width:100%;
			height: 48px;
			margin: 0 auto;
			background: #E2E2E2;
		}
		#navi a{
			display: block;
			width:48px;
			height: 48px;
		}
		#main {
			margin: 0 auto;
			border: 2px solid #ABCDEF;
		}
		img {
			width: 25px;
			height: 25px;
			border:0;
		}
	</style>
</head>
<body>
	<h1>在线文件管理器</h1>
	<div id="top">
		<ul id="navi">
			<li>
				<a href="index.php" title="主目录" >
					<span style="margin-left:8px; margin-top:0px;" class="icon icon-small icon-square"><span class="icon-home"></span></span>
				</a>
			</li>
			<li>
				<a href="#" onclick="show('createFile')" title="创建新文件">
					<span style="margin-left:8px;margin-top:0px;" class="icon icon-small icon-square"><span class="icon-file"></span></span>
				</a>
			</li>
			<li>
				<a href="#" onclick="show('createFolder')" title="创建目录">
					<span style="margin-left:8px;margin-top:0px;" class="icon icon-small icon-square"><span class="icon-folder"></span></span>
				</a>
			</li>
			<li>
				<a href="#" onclick="show('uploadFile')" title="上传文件">
					<span style="margin-left:8px;margin-top:0px;" class="icon icon-small icon-square"><span class="icon-upload"></span></span>
				</a>
			</li>
			<li>
				<a href="#" title="返回上级目录" onclick="back('')">
					<span style="margin-left:8px;margin-top:0px;" class="icon icon-small icon-square"><span class="icon-prev"></span></span>
				</a>
			</li>
		</ul>
	</div>
    <table id="main" width="100%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ABCDEF" align="center">
        <tr>
            <td>编号</td>
            <td>名称</td>
            <td>类型</td>
            <td>大小</td>
            <td>可读</td>
            <td>可写</td>
            <td>可执行</td>
            <td>创建时间</td>
            <td>访问时间</td>
            <td>操作</td>
        </tr>
        <?php
        if($info['file']) {
            $i = 1;
            foreach($info['file'] as $val) {
                $p = $path."/".$val;
        ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $val;?></td>
                <td><?php echo filetype($p);//$src = filetype($p)=="file"? "file_ico.png":"folder_ico.png";?><img src="images/<?php echo $src;?>" alt="" title="文件"/></td>
                <td><?php echo transByte(filesize($p));?></td>
                <td><?php echo $read = is_readable($p) == true? "可读":"不可读";?></td>
                <td><?php echo $write = is_writable($p) == true? "可写":"不可写";?></td>
                <td><?php echo $exe = is_executable($p) == true? "可执行":"不可执行";?></td>
                <td><?php echo date('Y-m-d H:m:s',filectime($p));?></td>
                <td><?php echo date('Y-m-d H:m:s',fileatime($p));?></td>
                <td>
                    <a href="#">打开</a>
                    <a></a>
                </td>
                <td></td>
            </tr>
        <?php
                $i++;
            }
        }
        ?>
    </table>
</body>
</html>