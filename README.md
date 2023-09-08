# Condition 1

Create a function add that takes a String and returns a String:

String add(String number)
The method can take 0, 1 or 2 numbers separated by comma, and returns their sum.
An empty string will return “0”.
Example of inputs: "", "1", "1.1,2.2".

# Condition 2

Allow the add method to handle an unknown number of arguments.

# Condition 3

Allow the add method to handle newlines as separators:

"1\n2,3" should return "6".
"175.2,\n35" is invalid and should return the message "Number expected but '\n' found at position 6."

# Condition 4

Don’t allow the input to end in a separator.

"1,3," is invalid and should return the message Number expected but EOF found.