<?php
/**
 * @var string $subject
 * @var string $content
 */
?>
<!DOCTYPE html>

<html>
<head>
    <title><?php echo $subject ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0,user-scalable=yes,target-densitydpi=device-dpi">
</head>

<body>
<style type="text/css" media="all">

    body { width: 100% !important; margin:0 !important; padding:0 !important;
        background-color: #FFFFFF !important;
        -webkit-text-size-adjust: none; -ms-text-size-adjust: none; }
    ul {padding-left:1em;}
    body, td { font-family:"Helvetica Neue", Arial, Helvetica, sans-serif; font-size:14px;line-height:1.4em;}
    #header td, #content td, #footer td {text-align:left !important;}
    h1, h2, h3 {margin-top:10px !important;}
    h1 {font-size:24px;line-height:1.1em;font-weight:normal !important}
    h2, h3 {font-size:16px; margin-bottom:5px;}
    a{color:#222266;text-decoration:underline}
    a:visited{color:#222266}
    a:active,a:hover{color:#2222aa;text-decoration:underline}.nolink-white a {color:white !important;text-decoration:none !important;}
    #wrapper td { background-color: #FFFFFF !important;}
    #content > td {background:#FFFFFF !important;padding-left:10px;padding-right:10px;text-align:left !important;}
    #content td, #content th { padding-right: 10px; text-align: left }
    #content div {clear:both !important;padding-top:1em !important;}
    #content p {text-align:left !important;margin-top:0;}
    #content .caption {font-style: italic;}
    #secondary td {
        border:1px solid #aaaaaa;
        width:33%;
        text-align:left;
        vertical-align:top;
        font-size:13px;
        background:#f7f7f7 !important;
    }
    #footer td {background-color:#DDDDDD !important; color:#333333 !important;
        text-align:left !important;
        font-size: 13px;
        line-height: 1.5em;
        padding:20px;
    }
    @media screen and (max-width: 480px) {
        body {min-width:100%;}
        .hide {display:none !important;}
        h1 {font-size:24px;line-height:1.1em;}
        ul {padding-left:2em;}
        #header, #content, #footer {width:100% !important;}
        #header .logocell img {display:none;}
        #header img.fluid {max-width:100% !important; height:25px !important;}
        .imgleft, .imgright {margin:0 0 10px 0 !important;}
        #content td {padding: 0 !important;padding-top:10px !important;}
        #content td p {padding-left:10px !important;padding-right:10px !important; font-size:16px !important;}
        #content td ul {padding-right:10px !important; font-size:16px !important;}
        #content td h1, #content td h2, #content td h3 {padding-left:10px !important;}
        #content img {display:block;float:none !important;max-width:100% !important;height:auto !important;}
        #content .imgleft, #content .imgright {margin:0 auto !important;}
        .twocolumns, .twocolumns tr {display:block;}
        .twocolumns td {
            display:block;
            width:100%;
            margin-bottom:5px;
        }
        #secondary, #secondary tr {display:block;}
        #secondary td {
            display:block;
            width:100%;
            margin-bottom:5px;
        }
        #secondary td p {font-size:14px !important;}
        #footer td {width:0 !important;padding:0 !important;}
        #footer td.content {width:100% !important;padding:10px !important}
    }
</style>
<table id="wrapper" width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table id="content" width="640" cellspacing="0" cellpadding="10">
                <tr>
                    <td align="left"><?php echo $content ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>