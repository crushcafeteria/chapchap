Chapchap
========
Many web application developers face a challenge in creating a decent help system  or knowledgebase
when building their applications. Some are forced to use wikis or online services like Readthedocs. 
Some of these substitutes require the developer to learn a new syntax or dive deep into plugins and extensions.

Chapchap is an app designed to create quick documentation and increase your productivity. Simply categorize your 
content into books e.g. Help Content e.t.c. Under each book, we have chapters. Chapters 
are the topics under each book. Example chapters under Help Content might be Creating an account, Logging in, Verifying your account e.t.c

Under each topic there are articles that are directly related to those chapters. You can create as many books, chapters and articles as you please. Chapchap also sports a JSON API that enables you to load your help content from a remote location. This is especially helpful when 
combined with AJAX methods or PHP's cURL.

#How to get it
Chapchap is free software for all. Download it [here](https://github.com/crushcafeteria/chapchap/archive/master.zip "Github Repo").
here, copy it to your server, dump the database and run it. If you have ever had a fling with CodeIgniter, feel free to crack open its innards and extend it as you see fit.

#Roadmap
* jQuery Plugin - imagine loading remote help on an element on hover or click like this:
$(element).chapchap({
trigger: "click",
permalink: "http://chapchap.co.ke/api/23"
});
* PDF Generation - generate PDF of a book, chapter or article on the fly quick, fast and easy
* Flexible Theming and Printing System - Microsoft Word like themes that can be used to style and print any info in the DB
* File conversions to popular formats like Word, ODT, txt, richtext, JSON, XML, PHP arrays e.t.c
* Better documentation - easy better docs (created by Chapchap of kos!)
