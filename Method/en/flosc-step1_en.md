## Step 1 : assessment of the function points

### IFPUG reference at Atos

Since 2007, Atos has been using the function points, and IFPUG in particular, throughout the entire group. So we have a substantial reference of projects evaluated with this method and we also have enough useful data to assess the number of function points of new projects.

The metric we propose to use is the match between the Source Lines Of Code (SLOC) and the number of function points (FP). Indeed, the projects assessed with the function points are then (once developed), measured by SLOC in order to keep the Atos' IFPUG reference up-to-date.

### SLOC

The SLOC measure used in this method is the one defined and detailed by Robert Park^[<http://www.sei.cmu.edu/library/abstracts/reports/92tr020.cfm>] from the Software Engineering Institute. Counting is implemented by several tools. We use the free implementation that we consider better maintained and that support more languages : cloc^[<http://cloc.sourceforge.net>].

### FP/SLOC ratio per programming language

The FP/SLOC ratios differ from one another in the reference, depending on the programming languages. Indeed, some languages are more verbose than others, so this parameter is taken into account.

Moreover, the ratios come from the measured values' median per language. The array below shows these ratios for the most popular languages.

 Language      median FP/SLOC ratio
----------    ------------------------
  C              107
  C++            53
  HTML           42
  Java           53
  JavaScript     55
  Perl           57
  PHP            56
  Python         57
  SQL            30

The detailed list of ratios for the different languages supported by cloc is available in the appendix.
