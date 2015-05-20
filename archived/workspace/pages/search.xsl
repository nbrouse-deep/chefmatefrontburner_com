<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:exslt="http://exslt.org/common">




<xsl:import href="../utilities/master.xsl" />




<xsl:template match="/data">
    <div class="intro">
        <h1>Search Results</h1>

        <!--
        <div class="search-again">
            <form action="/search/" method="get">
                <input type="text" name="keywords" placeholder="SEARCH" value="{$url-keywords}" />

                <input type="submit" value="Search" />
            </form>
        </div>
        -->

        <p>
            <span class="keywords">
                <xsl:value-of select="params/url-keywords" /> 
            </span>
            returned <xsl:value-of select="count(search/entry)" /> results.
        </p>
    </div>

    <xsl:if test="search/entry">
        <div class="results">
            <xsl:apply-templates select="search/entry" />
        </div>
    </xsl:if>

    <xsl:if test="not(search/entry)">

    </xsl:if>
</xsl:template>




<xsl:template match="search/entry">
    <xsl:variable name="link">
        <xsl:choose>
            <xsl:when test="@section = 'business-tips-intro'">
                <a href="/business-tips/">Business Tips</a>
            </xsl:when>

            <xsl:when test="@section =  'business-tips'">
                <a href="/business-tips/{headline/@handle}/">
                    <xsl:value-of select="headline" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'categories'">
                <a href="/products/{name/@handle}/">
                    <xsl:value-of select="name" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'contest-intro'">
                <a href="/contest/">
                    <xsl:value-of select="/data/navigation/page[@handle = 'contest']/name" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'menu-ideas'">
                <a href="/menu-ideas/{headline/@handle}/">
                    <xsl:value-of select="headline" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'menu-ideas-intro'">
                <a href="/menu-ideas/">Menu Ideas</a>
            </xsl:when>

            <xsl:when test="@section =  'partners-intro'">
                <a href="/partners/">Partners</a>
            </xsl:when>

            <xsl:when test="@section =  'products'">
                <a href="/about-us/">
                    <xsl:value-of select="name" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'products-intro'">
                <a href="/about-us/">
                    <xsl:value-of select="headline" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'promo-ideas'">
                <a href="/promo-ideas/{headline/@handle}">
                    <xsl:value-of select="headline" />
                </a>
            </xsl:when>

            <xsl:when test="@section =  'promo-ideas-intro'">
                <a href="/promo-ideas/">Promo Ideas</a>
            </xsl:when>
        </xsl:choose>
    </xsl:variable>

    <div>
        <h2>
            <xsl:copy-of select="$link" />
        </h2>

        <xsl:if test="byline or date">
            <h3>
                <xsl:if test="byline">
                    <span class="byline">
                        <xsl:value-of select="byline" />
                    </span>
                </xsl:if>

                <xsl:if test="date and byline">
                    <xsl:text>, </xsl:text>
                </xsl:if>

                <xsl:if test="date">
                    <span class="date">
                        <xsl:call-template name="format-date">
                            <xsl:with-param name="date" select="date/date/start" />
                            <xsl:with-param name="format" select="'%m+; %d;, %y+;'" />
                        </xsl:call-template>
                    </span>
                </xsl:if>
            </h3>
        </xsl:if>

        <xsl:choose>
            <xsl:when test="lead-in">
                <p>
                    <xsl:value-of select="lead-in" />
                </p>
            </xsl:when>
            <xsl:when test="description">
                <p>
                    <xsl:value-of select="description" />
                </p>
            </xsl:when>
            <xsl:otherwise>
                <p>
                    <xsl:value-of select="excerpt/*" />

                    <xsl:text> </xsl:text>

                    <a href="{exslt:node-set($link)/a/@href}">Keep Reading</a>
                </p>
            </xsl:otherwise>
        </xsl:choose>
    </div>
</xsl:template>
</xsl:stylesheet>
