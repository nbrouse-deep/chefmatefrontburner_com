<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">




<!-- <head> -->
<xsl:template name="head">
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-Frame-Options" content="Deny" /> 

    <title>
        <xsl:call-template name="title" />
        <xsl:text> | </xsl:text>
        <xsl:value-of select="data/params/website-name" />
    </title>


    <link rel="stylesheet" href="https://stag1.chefmatefrontburner.com/workspace/css/style.css" />

    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css' />


    <script src="https://stag1.chefmatefrontburner.com/workspace/js/libs/modernizr-2.6.2.min.js"></script>
</xsl:template>



<xsl:template name="title">
    <xsl:value-of select="/data/params/page-title" />
</xsl:template>
</xsl:stylesheet>
