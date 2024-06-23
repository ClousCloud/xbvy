<?php

namespace xpocketmc\xbvy;

use xpocketmc\math\Math;
use pocketmine\errorhandler\ErrorHandler;
use xpocketmc\xbvy\XPocketMPHandler;

class VBT {
    public Math $math;
    public ErrorHandler $errorHandler;

    public function __construct(Math $math, ErrorHandler $errorHandler) {
        $this->math = $math;
        $this->errorHandler = $errorHandler;
    }

    public function calculateAreaOfSquare(float $sideLength): float {
        return $this->math->square($sideLength);
    }

    public function safeCalculateAreaOfSquare(float $sideLength): float {
        try {
            return $this->calculateAreaOfSquare($sideLength);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function onServer(Math $math): void {
        $area = $math->square(5);
        echo "Area of Square with side 5: " . $area . PHP_EOL;
    }

    public function calculateVolumeOfCube(float $sideLength): float {
        return $this->math->cube($sideLength);
    }

    public function safeCalculateVolumeOfCube(float $sideLength): float {
        try {
            return $this->calculateVolumeOfCube($sideLength);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateCircleArea(float $radius): float {
        return $this->math->pi() * $this->math->square($radius);
    }

    public function safeCalculateCircleArea(float $radius): float {
        try {
            return $this->calculateCircleArea($radius);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateSphereVolume(float $radius): float {
        return (4/3) * $this->math->pi() * $this->math->cube($radius);
    }

    public function safeCalculateSphereVolume(float $radius): float {
        try {
            return $this->calculateSphereVolume($radius);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateCylinderVolume(float $radius, float $height): float {
        return $this->math->pi() * $this->math->square($radius) * $height;
    }

    public function safeCalculateCylinderVolume(float $radius, float $height): float {
        try {
            return $this->calculateCylinderVolume($radius, $height);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateConeVolume(float $radius, float $height): float {
        return (1/3) * $this->math->pi() * $this->math->square($radius) * $height;
    }

    public function safeCalculateConeVolume(float $radius, float $height): float {
        try {
            return $this->calculateConeVolume($radius, $height);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateRectanglePerimeter(float $length, float $width): float {
        return 2 * ($length + $width);
    }

    public function safeCalculateRectanglePerimeter(float $length, float $width): float {
        try {
            return $this->calculateRectanglePerimeter($length, $width);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateTrianglePerimeter(float $side1, float $side2, float $side3): float {
        return $side1 + $side2 + $side3;
    }

    public function safeCalculateTrianglePerimeter(float $side1, float $side2, float $side3): float {
        try {
            return $this->calculateTrianglePerimeter($side1, $side2, $side3);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function calculateCircleCircumference(float $radius): float {
        return 2 * $this->math->pi() * $radius;
    }

    public function safeCalculateCircleCircumference(float $radius): float {
        try {
            return $this->calculateCircleCircumference($radius);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e);
            return 0.0;
        }
    }

    public function logError(\Exception $e): void {
        $this->errorHandler->log($e);
    }

    public function handleErrorGracefully(\Exception $e): void {
        $this->errorHandler->handle($e);
        echo "An error occurred: " . $e->getMessage() . PHP_EOL;
    }

    public function performComplexCalculation(array $values): float {
        try {
            $result = 0.0;
            foreach ($values as $value) {
                $result += $this->math->sqrt($value);
            }
            return $result;
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculatePythagoreanTheorem(float $a, float $b): float {
        try {
            return $this->math->sqrt($this->math->square($a) + $this->math->square($b));
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateQuadraticFormula(float $a, float $b, float $c): array {
        try {
            $discriminant = $this->math->square($b) - 4 * $a * $c;
            if ($discriminant < 0) {
                throw new \Exception("No real roots");
            }
            $sqrtDiscriminant = $this->math->sqrt($discriminant);
            $root1 = (-$b + $sqrtDiscriminant) / (2 * $a);
            $root2 = (-$b - $sqrtDiscriminant) / (2 * $a);
            return [$root1, $root2];
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return [0.0, 0.0];
        }
    }

    public function calculateLogarithm(float $value, float $base = M_E): float {
        try {
            return $this->math->log($value, $base);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateExponential(float $value): float {
        try {
            return $this->math->exp($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateFactorial(int $n): int {
        try {
            return $this->math->factorial($n);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0;
        }
    }

    public function calculateCombination(int $n, int $k): int {
        try {
            return $this->math->combination($n, $k);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0;
        }
    }

    public function calculatePermutation(int $n, int $k): int {
        try {
            return $this->math->permutation($n, $k);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0;
        }
    }

    public function calculateGCD(int $a, int $b): int {
        try {
            return $this->math->gcd($a, $b);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0;
        }
    }

    public function calculateLCM(int $a, int $b): int {
        try {
            return $this->math->lcm($a, $b);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0;
        }
    }

    public function calculatePrimeFactors(int $n): array {
        try {
            return $this->math->primeFactors($n);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return [];
        }
    }

    public function isPrime(int $n): bool {
        try {
            return $this->math->isPrime($n);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return false;
        }
    }

    public function calculatePower(float $base, float $exponent): float {
        try {
            return $this->math->pow($base, $exponent);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateSine(float $angle): float {
        try {
            return $this->math->sin($angle);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateCosine(float $angle): float {
        try {
            return $this->math->cos($angle);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateTangent(float $angle): float {
        try {
            return $this->math->tan($angle);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateArcSine(float $value): float {
        try {
            return $this->math->asin($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateArcCosine(float $value): float {
        try {
            return $this->math->acos($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateArcTangent(float $value): float {
        try {
            return $this->math->atan($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateHyperbolicSine(float $value): float {
        try {
            return $this->math->sinh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateHyperbolicCosine(float $value): float {
        try {
            return $this->math->cosh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateHyperbolicTangent(float $value): float {
        try {
            return $this->math->tanh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateInverseHyperbolicSine(float $value): float {
        try {
            return $this->math->asinh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateInverseHyperbolicCosine(float $value): float {
        try {
            return $this->math->acosh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function calculateInverseHyperbolicTangent(float $value): float {
        try {
            return $this->math->atanh($value);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }

    public function convertDegreesToRadians(float $degrees): float {
        return $this->math->degToRad($degrees);
    }

    public function convertRadiansToDegrees(float $radians): float {
        return $this->math->radToDeg($radians);
    }

    public function calculateDistanceBetweenPoints(float $x1, float $y1, float $x2, float $y2): float {
        return $this->math->sqrt($this->math->square($x2 - $x1) + $this->math->square($y2 - $y1));
    }

    public function calculateMidpoint(float $x1, float $y1, float $x2, float $y2): array {
        return [($x1 + $x2) / 2, ($y1 + $y2) / 2];
    }

    public function solveLinearEquation(float $a, float $b): float {
        if ($a == 0) {
            throw new \Exception("No solution exists");
        }
        return -$b / $a;
    }

    public function safeSolveLinearEquation(float $a, float $b): float {
        try {
            return $this->solveLinearEquation($a, $b);
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return 0.0;
        }
    }
    
    public function XPocketMPHandler() {
      $this->XPocketMPHandler();
      return true;
    }

    public function solveLinearSystem(array $matrix, array $constants): array {
        // Placeholder for a method that solves a system of linear equations using matrix operations
        try {
            // Example of solving system using Gaussian elimination
            $n = count($constants);
            for ($i = 0; $i < $n; $i++) {
                // Search for maximum in this column
                $maxEl = abs($matrix[$i][$i]);
                $maxRow = $i;
                for ($k = $i + 1; $k < $n; $k++) {
                    if (abs($matrix[$k][$i]) > $maxEl) {
                        $maxEl = abs($matrix[$k][$i]);
                        $maxRow = $k;
                    }
                }

                // Swap maximum row with current row (column by column)
                for ($k = $i; $k < $n; $k++) {
                    $tmp = $matrix[$maxRow][$k];
                    $matrix[$maxRow][$k] = $matrix[$i][$k];
                    $matrix[$i][$k] = $tmp;
                }
                $tmp = $constants[$maxRow];
                $constants[$maxRow] = $constants[$i];
                $constants[$i] = $tmp;

                // Make all rows below this one 0 in current column
                for ($k = $i + 1; $k < $n; $k++) {
                    $c = -$matrix[$k][$i] / $matrix[$i][$i];
                    for ($j = $i; $j < $n; $j++) {
                        if ($i == $j) {
                            $matrix[$k][$j] = 0;
                        } else {
                            $matrix[$k][$j] += $c * $matrix[$i][$j];
                        }
                    }
                    $constants[$k] += $c * $constants[$i];
                }
            }

            // Solve equation Ax=b for an upper triangular matrix A
            $x = array_fill(0, $n, 0);
            for ($i = $n - 1; $i >= 0; $i--) {
                $x[$i] = $constants[$i] / $matrix[$i][$i];
                for ($k = $i - 1; $k >= 0; $k--) {
                    $constants[$k] -= $matrix[$k][$i] * $x[$i];
                }
            }
            return $x;
        } catch (\Exception $e) {
            $this->handleErrorGracefully($e);
            return [];
        }
    }
}
