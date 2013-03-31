---
layout: page
title: How simple is open source software?
tagline: Free/Libre Open Source Complexity
---
{% include JB/setup %}

![FLOSC logo](https://raw.github.com/drakkr/FLOSC/master/Method/fr/Images/flosc-logo-small.png)

<a href="https://github.com/drakkr/FLOSC/"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
    
## Recent news

<ul class="posts">
  {% for post in site.posts limit: 5 %}
    <li><span>{{ post.date | date_to_string }}</span> &raquo; <a href="{{ BASE_PATH }}{{ post.url }}">{{ post.title }}</a></li>
  {% endfor %}
</ul>

## Method

Assessing the complexity of software is a wellknown problem in IT. Several methods have been proposed spreading from simply counting lines of code to more sophisticated approach like the method of function points.

FLOSC proposes an intermediate approach between these two extremes in order to obtain a simple process, adapted to free and open source software.

## Process

The __Function Points__ (FP) method measures the size of an application by quantifying the functionality provided to users or other applications as long as data manipulation. This measurement is performed based on functional specifications and logical data modeling.

However, __we propose to adapt this method to free and open source software__:

* _estimate_ Function Points from _single lines of code_ and _ratios_ generally observed in the IT industry

* use _adjustment factors_ specific to free and open source software but within the logic proposed by the Function Points method

![FLOSCC process](https://raw.github.com/drakkr/FLOSC/master/Method/en/Images/process_en.png)

The FLOSC process can be divided into three steps:

* estimation of Function Points by counting Single Lines Of Code (SLOC) and applying ratios by programing language

* adjustement of estimated Function Points with the following criteria:

    + industrialization of the project and development team

    + architecture and organization of source code

    + external dependencies (libraries, plugins...)

## Data and Tools

SLOC are counted with the [cloc](http://cloc.sourceforge.net) open source component.

Cloc results are then imported and stored in the [WebFLOSC]() application for later ajustment and visualization.

![WebFLOSC snapshot](https://raw.github.com/drakkr/FLOSC/master/Method/fr/Images/WebFLOSC-menu.png)