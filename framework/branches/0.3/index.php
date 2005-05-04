<?php 
header('Content-Type: text/html; charset="utf-8"'); 
$install_root = str_replace( '\\', '/', dirname( __FILE__ ));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to Openology</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type='text/css'>
	body {
		margin: 10px 25px; 
		font-family: Century Gothic, Tahoma, Verdana, sans-serif;
		font-size: small;}
	h1 {
		margin-top: 3px;
		font-size: 140%}
	h2 {font-size: 110%}
	.langbox {
		margin: 5px;
		border: 1px solid #ccc;
		padding: 5px
	}
	</style>
</head>
<body> 
<div> <a href="#en">English</a> <a href="#zh-cn">简体中文</a> <a href="#lang"><span style="font-size: smaller">your language here ...</span></a> </div> 

<div class="langbox"> <a name="en" id="en"></a> 
    <h1>Using Openology Framework</h1> 
    <p>You had already downloaded and uncompressed an Openology Framework package. Download the lib package if you have not done so. </p> 
    <h2>Demo</h2> 
    <p>Demo is in: <?php echo $install_root ?>/demo/</p> 
    <p>The Demo provides a quick overview of how to put together an application using the framework.<br /> 
        To install the Demo, </p> 
    <ol> 
        <li>Create a database using a tool like PHPMyAdmin and create the tables using <a href="demo/install/db.sql">/demo/install/sql</a>.</li> 
        <li>Update the configuration in /demo/config.php. </li> 
        <li> Point your browser to <a href="demo/"><?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/demo</a>/. </li> 
    </ol> 
    <h2>Admin</h2> 
    <p>Admin is in: <?php echo $install_root ?>/admin/</p> 
    <p>The Admin provides an interface to integrate the development process when using Openology framework. Functions includes setup, database setup, application flow, generation of classes, form creation.<br /> 
        To use the Admin, </p> 
    <ol> 
        <li>Edit <?php echo $install_root ?>/admin/config.php </li> 
        <li>Point your browser to <a href="admin/"><?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/admin</a>/. .</li> 
    </ol> 
    <p>The Admin is still work in progress. Users are invited to help and/or feedback on the development of the Admin. </p>
    <h2>Application Skeleton</h2> 
    <p>The application skeleton is in : <?php echo $install_root ?>/app/</p> 
    <p>The framework can be used immediately for development after unpacking the files. The application skeleton provides a standard structure for building application on with the framework.<br /> 
        To use the application skeleton,</p> 
    <ol> 
        <li>Duplicate the folder <?php echo $install_root ?>/app to another folder (for example, <?php echo $install_root ?>/myapp). </li> 
        <li>Edit <?php echo $install_root ?>/myapp/config.php </li> 
        <li>Add your codes </li> 
        <li>Point your browser to <?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/myapp/. </li> 
    </ol> 
    <p>The Admin can also be used to help setup the structure.</p> 
</div> 


<div class="langbox"> <a name="zh-cn" id="zh-cn"></a> 
    <h1>应用Openology框架</h1> 
    <p>您以下载并解压了Openology框架文件包。如未下lib类库包，请立即下载。</p> 
    <h2>演示 (Demo)</h2> 
    <p>演示在: <?php echo $install_root ?>/demo/</p> 
    <p>通过察看演示可了解怎样应用Openology框架进行开发。<br /> 
        安装Demo, </p> 
    <ol> 
        <li>用类似PHPMyAdmin的工具创建一个数据库然后用<a href="demo/install/db.sql">/demo/install/sql</a>把表导人。</li> 
        <li>修改配置文件<?php echo $install_root ?>/demo/config.php</li> 
        <li>访问<a href="demo/"><?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/demo</a></li> 
    </ol> 

    <h2>管理后台(Admin)</h2> 
    <p>管理后台在: <?php echo $install_root ?>/admin/</p> 
    <p>管理后台提供了一个界面帮助在Openology框架上的开发的。功能包括配置，创建数据库，设定程序流程，生成类‘表单。<br /> 
        应用Admin </p> 
    <ol> 
        <li>用类似PHPMyAdmin的工具创建一个数据库然后用<a href="install/sql/base.sql" title="base database SQL">sql</a>把表导人。</li> 
        <li>修改配置文件<?php echo $install_root ?>/admin/config.php </li> 
        <li>访问<a href="admin/"><?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/admin</a></li> 
    </ol> 

    <p>管理后台仍在开发中，城邀用户一同开发或反馈。</p>

    <h2>应用程序骨架</h2> 
    <p>应用程序骨架在: <?php echo $install_root ?>/app/</p> 
    <p>Openology框架解压后可立即供开发使用。应用程序骨架提供了基本目录及文件结构。<br /> 
        应用骨架 </p> 	
    <ol> 
        <li>复制<?php echo $install_root ?>/app目录到另一个目录(如<?php echo $install_root ?>/myapp)</li> 
        <li>修改配置文件<?php echo $install_root ?>/myapp/config.php </li> 
        <li>添加所需程序</li> 
        <li>访问<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/myapp/. </li> 
    </ol> 
    <p>也可用Admin来帮助创建应用程序结构。</p>
</div> 

<div class="langbox"> <a name="lang"></a> 
    <h1>Your language here ...</h1> 
	<p>Help us translate this introduction into your language.</p>
	<h2>How?</h2>
	<ol>
		<li>View the source of this file.</li>
		<li>Copy the english introduction, everything within &lt;div class=&quot;langbox&quot;&gt; ... &lt;/div&gt; (including the &lt;div&gt; tag) and paste it before this section.</li>
	<li>Translate the text. </li>
	    <li>Update the language anchor link at the top of the page. (Use 2 characters ISO code.) </li>
	<li>Update the anchor just before &lt;H1&gt; tag. </li>
	</ol>
<p>Note: the encoding of this file is in utf-8.</p>
</div> 

</body>
</html>
