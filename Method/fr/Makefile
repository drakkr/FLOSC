# Makefile for FLOSC Method - French version

all: doc-pdf

doc-pdf:
	pandoc -N --toc --template=flosc-template_fr.latex --variable lang=french -o flosc-1.1_fr.pdf flosc-head_fr.md flosc-changelog_fr.md flosc-intro_fr.md flosc-process_fr.md flosc-step1_fr.md flosc-steps2-3_fr.md flosc-tools_fr.md flosc-appendixA_fr.md flosc-appendixB_fr.md

doc-odt:
	pandoc --toc -o flosc-1.1_fr.odt flosc-head_fr.md flosc-changelog_fr.md flosc-intro_fr.md flosc-process_fr.md flosc-step1_fr.md flosc-steps2-3_fr.md flosc-tools_fr.md flosc-appendixA_fr.md flosc-appendixB_fr.md

doc-html:
	pandoc --self-contained -o flosc-1.1_fr.html flosc-head_fr.md flosc-changelog_fr.md flosc-intro_fr.md flosc-process_fr.md flosc-step1_fr.md flosc-steps2-3_fr.md flosc-tools_fr.md flosc-appendixA_fr.md flosc-appendixB_fr.md
