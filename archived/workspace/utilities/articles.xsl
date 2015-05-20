<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">



<!--
     IMPORTANT:

     article urls are built based on the assumption that the 
     data source, section, and page are all named exactly 
     the same, eg: menu-ideas, business-tips, promo-ideas
-->



<!-- article teasers -->
<xsl:template match="entry" mode="teaser">
    <xsl:param name="type" select="''" />
    <xsl:param name="link-to-all" select="'no'" />


    <article class="teaser" style="background-image: url(/image/2/660/275/5{image/@path}/{image/filename});">
        <xsl:if test="$type != ''">
            <h1>
                <xsl:value-of select="$type" />
            </h1>
        </xsl:if>


        <div class="headline">
            <h2>
                <a href="/{local-name(..)}/{headline/@handle}/">
                    <xsl:value-of select="headline" />
                </a>
            </h2>
        </div>


        <div class="summary">
            <p class="byline">
                <span>
                    <xsl:value-of select="byline" />

                    <xsl:if test="date">
                        <xsl:text>, </xsl:text>
                        
                        <xsl:call-template name="format-date">
                            <xsl:with-param name="date" select="date/date/start" />
                            <xsl:with-param name="format" select="'%m+; %d;, %y+;'" />
                        </xsl:call-template>
                    </xsl:if>
                </span>
            </p>


            <p class="lead-in">
                <span>
                    <xsl:value-of select="lead-in" />

                    <xsl:text> </xsl:text>

                    <a href="/{local-name(..)}/{headline/@handle}/" class="keep-reading">Keep&#160;Reading</a>
                </span>
            </p>

            <xsl:if test="$link-to-all = 'yes'">
                <p class="see-all">
                    <a href="/{local-name(..)}/">
                        See all <xsl:value-of select="../section" />
                    </a>
                </p>
            </xsl:if>
        </div>

        <a href="/{local-name(..)}/{headline/@handle}/" class="read-more">Read More</a>
    </article>
</xsl:template>




<!-- article detail-->
<xsl:template match="entry" mode="detail">
    <article class="detail">
        <img src="/image/2/660/260/5{image/@path}/{image/filename}" class="header-image" />


        <div class="copy">
            <a href="/{$current-page}/" class="back">
                <xsl:value-of select="$page-title" />
            </a>


            <div class="body">
                <h1>
                    <xsl:value-of select="headline" />
                </h1>

                
                <!-- next article/previous article -->
                <ul class="nav mobile-only">
                    <xsl:if test=". != ../entry[last()]">
                        <li class="prev">
                            <a href="/{local-name(..)}/{./following-sibling::*[1]/headline/@handle}/">
                                Previous
                            </a>
                        </li>
                    </xsl:if>

                    <xsl:if test=". != ../entry[position() = 1]">
                        <li class="next">
                            <a href="/{local-name(..)}/{./preceding-sibling::*[1]/headline/@handle}/">
                                Next
                            </a>
                        </li>
                    </xsl:if>
                </ul>

                <xsl:if test="not(local-name(..) = 'menu-ideas') and byline">
                    <p class="byline">
                        <xsl:value-of select="byline" />
                        <br />

                        <xsl:if test="date">
                            <span class="date">
                                <xsl:call-template name="format-date">
                                    <xsl:with-param name="date" select="date/date/start" />
                                    <xsl:with-param name="format" select="'%m+; %d;, %y+;'" />
                                </xsl:call-template>
                            </span>
                        </xsl:if>
                    </p>
                </xsl:if>                    


                <!-- regular article -->
                <xsl:if test="copy">
                    <xsl:copy-of select="copy/*" />
                </xsl:if>


                <!-- recipe -->
                <xsl:if test="introduction and ingredients and procedure">
                    <div class="introduction">
                        <xsl:copy-of select="introduction/*" />
                    </div>

                    <div class="ingredients">
                        <h2>Ingredients:</h2>

                        <table>
                            <thead>
                                <th class="first"></th>
                                <th class="second"></th>
                                <th class="third"></th>
                            </thead>

                            <tbody>
                                <xsl:for-each select="ingredients/item">
                                    <tr>
                                        <td class="first">
                                            <xsl:value-of select="column-1" />
                                        </td>

                                        <td class="second">
                                            <xsl:value-of select="column-2" />
                                        </td>

                                        <td>
                                            <!-- apply a class if this column has content, for css purposes -->
                                            <xsl:attribute name="class">third<xsl:if test="column-3/text()"> has-content</xsl:if></xsl:attribute>
                                            <xsl:value-of select="column-3" />
                                        </td>
                                    </tr>
                                </xsl:for-each>
                            </tbody>
                        </table>
                    </div>

                    <div class="procedure">
                        <h2>Procedure:</h2>

                        <xsl:copy-of select="procedure/*" />
                    </div>
                </xsl:if>
            </div>

            <ul class="actions">
                <li>
                    <a href="mailto:?subject={headline}&amp;body={$current-url}" class="email">Email this article</a>
                </li>

                <xsl:if test="local-name(..) = 'menu-ideas' or local-name(..) = 'quebueno'">
                    <li>
                        <a href="javascript:window.print()" class="print">Print</a>
                    </li>
                </xsl:if>
            </ul>
        </div>


        <div class="other-articles">
            <h2>Read more popular <xsl:value-of select="../section" /></h2>

            <!-- next article/previous article -->
            <ul class="nav">
                <xsl:if test=". != ../entry[last()]">
                    <li>
                        <a href="/{local-name(..)}/{./following-sibling::*[1]/headline/@handle}/">
                            <xsl:value-of select="./following-sibling::entry[1]/headline" />
                        </a>
                    </li>
                </xsl:if>

                <xsl:if test=". != ../entry[position() = 1]">
                    <li>
                        <a href="/{local-name(..)}/{./preceding-sibling::*[1]/headline/@handle}/">
                            <xsl:value-of select="./preceding-sibling::entry[1]/headline" />
                        </a>
                    </li>
                </xsl:if>
            </ul>


            <!-- related articles -->
            <!--
            <xsl:if test="related-articles">
                <ul class="related">
                    <xsl:apply-templates select="related-articles/item" />
                </ul>
            </xsl:if>
            -->
        </div>
    </article>
</xsl:template>




<!-- related articles -->
<xsl:template match="related-articles/item">
    <li>
        <a href="/{@section-handle}/{@handle}/">
            <xsl:value-of select="." />
        </a>
    </li>
</xsl:template>




<!-- next/prev articles -->
<xsl:template match="entry" mode="prev-next">
    <li>
        <a href="">
        </a>
    </li>
</xsl:template>
</xsl:stylesheet>
