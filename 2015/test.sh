#!/bin/bash
cd $1
$2 < example/input.txt > output.txt
diff example/output.txt output.txt
