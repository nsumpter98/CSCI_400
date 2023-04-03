//An example of a JavaScript code placed in an external file.


document.writeln("<p>This line is created using a JavaScript external source file</p>");

//Rounding:
document.writeln("<pre>");
document.writeln("Rounding numbers");
document.writeln(Math.round(87.422));//rounds to zero decimal points
document.writeln(Math.round(87.422*10)/10);//rounds to 1 decimal
document.writeln(Math.round(87.758*100)/100);//rounds to two decimals
			
var num = 87.758;
//toFixed() is a method that converts a number into a string. It truncates the number by
//keeping a specified number of decimals:
document.writeln(num.toFixed(2));
document.writeln("</pre>");
