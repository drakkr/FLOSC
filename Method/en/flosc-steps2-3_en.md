##  Step 2 : Function Point adjustment

The calculated function points are adjusted according to the following criteria:

* level of industrialization of the project in charge of the software development (criterion C1) ;

* level of organization and architecture of the source code (criterion C2) ;

* software dependencies in terms of external libraries and plugins (criterion C3).

These criteria are evaluated with discrete scores between 0 and 2, whose meanings are listed hereafter.

__Criterion C1 :__ level of industrialization of the project :

* 0 : no tool used to manage the development (bug-tracker, forums...), source code hard to find, no roadmap ;

* 1 : only some processes are shown, used, with tools ;

* 2 : development process, feature requests, tests, continuous integration... implemented, documented and respected.

__Criterion C2 :__ level of organization and architecture of the source code :

* 0 : monolithic code, non object oriented language, no layers or modules organization ;

* 1 : weak code architecture with some code factoring, but not in the whole code ;

* 2 : very modular code, object oriented with the use of inheritance and interfaces, with modules matching with different functional layers.

__Criterion C3 :__ software dependencies in terms of external libraries and plugins :

* 0 : piece of software with many external libraries or many plugins ;

* 1 : piece of software with some external libraries or that can be extended with plugins ;

* 2 : piece of software without any external library and that can not be extended with plugins.

The IFPUG function points analysis describes the way the adjustment factors are used to modify the number of FP, with the following formula :

$PF_{adjusted} = PF_{not-adjusted} * (0,65 + \frac{\sum factors}{100})$

In IFPUG, there are 14 factors scored between 0 and 5. The number of function points may then vary from 65% to 135%.

In the adapted version that we propose, we use only three factors, to stay within the same order of variability as the standard IFPUG method. So we use the following formula :

$PF_{adjusted} = PF_{not-adjusted} * (0,65 + \frac{(2 - C1) + (2 - C2) + (2 - C3)}{20})$

## Step 3 : determining the complexity

Based on metrics coming from the use of this approach based on IFPUG, the following abacus is used to determine the level of complexity of a piece of free and open source software.

Number of adjusted FP       Level of complexity
---------------------     ------------------------
lower than 1000                  Simple
between 1000 and 10 000          Complex
greater than 10 000              Very complex
