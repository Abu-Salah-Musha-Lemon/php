#include<reg51.h>
sbit CS=P3^3;           //CS of DAC 0832
sbit WR1=113^4;         //WR1 of DAC 0832
sbit XFER=P3^5;
void main()             // Start of main() function
P1 = Ox00;              // Initialize Port 1 as Output Port
CS=O;
while(1)                // Infinite Loop
{
    do
    {

        WR1=1;
        XFER=1;
        P1 += 0x05;
        WR1=0;
        XFER=O;
    }
    while(Pl<OxFF);
    do
    {
        WR1=1;
        XFER=1;
        WR1=1;
        XFER=1;
        P1 -= 0x05;
        WR1=0;
        XFER=O;
        while(P1>0x00);
    }
}