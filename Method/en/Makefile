# Makefile for FLOSC Method - English version

all: doc-pdf

doc-pdf:
	pandoc -N --toc --template=flosc-template_en.latex --variable lang=english -o flosc-1.1_en.pdf flosc-head_en.md flosc-changelog_en.md flosc-intro_en.md flosc-process_en.md flosc-step1_en.md flosc-steps2-3_en.md flosc-tools_en.md flosc-appendixA_en.md flosc-appendixB_en.md

doc-odt:
	pandoc --toc -o flosc-1.1_en.odt flosc-head_en.md flosc-changelog_en.md flosc-intro_en.md flosc-process_en.md flosc-step1_en.md flosc-steps2-3_en.md flosc-tools_en.md flosc-appendixA_en.md flosc-appendixB_en.md

doc-html:
	pandoc --self-contained -o flosc-1.1_en.html flosc-head_en.md flosc-changelog_en.md flosc-intro_en.md flosc-process_en.md flosc-step1_en.md flosc-steps2-3_en.md flosc-tools_en.md flosc-appendixA_en.md flosc-appendixB_en.md
