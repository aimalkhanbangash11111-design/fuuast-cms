#include <stdio.h>
#include <omp.h>

int main() {
    int N = 1000000; 
    double sum = 0, min = 1e30, max = -1e30;
    int count_above = 0;
    double threshold = 250.0;

    #pragma omp parallel for default(none) \
             shared(N, threshold) \
             reduction(+:sum) \
             reduction(min:min) \
             reduction(max:max) \
             reduction(+:count_above)
    for(int i = 0; i < N; i++) {
        double x = (i % 1000) * 0.5;
        sum += x; 
        if(x < min) min = x; 
        if(x > max) max = x;
        
        if(x > threshold) {
            count_above++;
        }
    }

    double average = sum / N;

    printf("--- OpenMP Lab 04 Results ---\n");
    printf("Sum = %.2f\n", sum);
    printf("Min = %.2f\n", min);
    printf("Max = %.2f\n", max);
    printf("Average = %.2f\n", average);
    printf("Count above %.2f = %d\n", threshold, count_above);

    return 0;
}