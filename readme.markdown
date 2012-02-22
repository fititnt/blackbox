#### Experimental Black Box Design Pattern

Consider this repository one work in progress. Thinks and definition can change
any time, and maybe entire concept can be discarded if be proved that is not
good enough

#### Summary
The concept of software design pattern is that all minimal information of the
application is inserted and obtained from a single site before being used in 
everything else. Thus, specific triggers can be used before returning such 
information in order to minimize the amount of data entered initially and then 
used.

#### Somewhat more practical

When black box concept is used, load up an array containing all the common
settings. Special functions can be activated before returning these values,
such as applying a behavior to all fields of a sub array.

Thus, a prior information should be entered directly into your application can
be obtained directly from the black box, but the functions that you can change
these customize functions as its context.

#### Advantages
 -> Can probably be used within the existing standards, without major changes
 -> It is useful in repeating patterns where the code is high

#### Disadvantages
 -> Some code patterns provably do almost this pattern implicitly, so use one
    more pattern could be not only more code and complexity but one overload
