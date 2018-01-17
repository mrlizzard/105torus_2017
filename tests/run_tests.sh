#!/bin/bash

EXIT=0;

function print_diff() {
	for LINE in $1; do
		echo "  ${LINE}";
	done
}

make re;
mkdir tests/run;

## Bisection test
./105torus 1 -1 0 6 -5 1 6 > tests/run/bisection;
diff tests/run/bisection tests/bisection > tests/run/print;
RET=$(cat tests/run/print);

if [[ "$RET" != "" ]]; then
	echo -e "[NO] Bisection test failed. Results:";
	cat tests/run/print;
	EXIT=84;
else
	echo -e "[OK] Bisection test passed. Next.";
fi

## Newton test
./105torus 2 -1 0 6 -5 1 12 > tests/run/newton;
diff tests/run/newton tests/newton > tests/run/print;
RET=$(cat tests/run/print);

if [[ "$RET" != "" ]]; then
	echo -e "[NO] Newton test failed. Results:";
	cat tests/run/print;
	EXIT=84;
else
	echo -e "[OK] Newton test passed. Next.";
fi

## Secant test
./105torus 3 -1 0 6 -5 1 8 > tests/run/secant;
diff tests/run/secant tests/secant > tests/run/print;
RET=$(cat tests/run/print);

if [[ "$RET" != "" ]]; then
	echo -e "[NO] Secant test failed. Results:";
	cat tests/run/print;
	EXIT=84;
else
	echo -e "[OK] Secant test passed. Next.";
fi

## Remove test files
rm -rf tests/run;
GN=$(make fclean);

exit $EXIT;