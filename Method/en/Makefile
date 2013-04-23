# Makefile for FLOSC method - English version

DOC=flosc

VERSION=1.1

LANG=en

TITLE=Method of evaluation of Free/Libre Open Source Complexity (FLOSC)

#List of edocs to be included in Gitit export
PAGES=flosc-intro_$(LANG).md flosc-process_$(LANG).md flosc-step1_$(LANG).md flosc-steps2-3_$(LANG).md flosc-tools_$(LANG).md flosc-appendixA_$(LANG).md

#List of edocs to be included in other exports
CHAPTERS=flosc-head_$(LANG).md flosc-changelog_$(LANG).md $(PAGES) flosc-appendixB_$(LANG).md

DOCNAME=$(DOC)-$(VERSION)_$(LANG)

doc-pdf:
	mkdir -p dist
	pandoc -N --toc --template=flosc-template_$(LANG).latex --variable lang=english -o dist/$(DOCNAME).pdf $(CHAPTERS)

doc-odt:
	mkdir -p dist
	pandoc --toc -o dist/$(DOCNAME).odt $(CHAPTERS)

doc-html:
	mkdir -p dist
	pandoc --self-contained -o dist/$(DOCNAME).html $(CHAPTERS)

gitit:
	mkdir -p dist
	cp -R Images dist/.
	#Create summary Gitit page
	echo '---' > dist/$(DOCNAME).page
	echo "title: $(TITLE)" >> dist/$(DOCNAME).page
	echo '...' >> dist/$(DOCNAME).page
	echo -e '\n' >> dist/$(DOCNAME).page

	$(foreach PAGE, $(PAGES), echo -e "[$(subst # ,,$(shell head -1 $(PAGE)))]($(basename $(PAGE))) \n" >> dist/$(DOCNAME).page ;)

	#Create Gitit pages with titles
	$(foreach PAGE, $(PAGES), echo -e "---\ntitle: $(subst # ,,$(shell head -1 $(PAGE)))\n...\n" > dist/$(basename $(PAGE)).page ; cat $(PAGE) >> dist/$(basename $(PAGE)).page ;)

clean:
	rm -Rf dist/
