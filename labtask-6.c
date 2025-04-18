#include<stdio.h>
#include<math.h>
int main(){
    char name[100];
    printf("Enter your name: ");
    fgets(name, sizeof(name), stdin);
    printf("Hello %s\n", name);
    float angle,bforce,dforce,eforce,Fab,Fbc,Fde,Fda,Fdb,Fec,Feb,sina,cosa,r1,r3;
    printf("TRUSS IS SYMMETRIC!\n");
        printf("  4    5\n");
    printf("   ____\n");
    printf("  /\\  /\\\n");
    printf(" /  \\/  \\\n");
    printf("----------\n");
    printf("1    2    3\n");
    printf("Enter force on 2 in kN:\n");
    scanf("%f",&bforce);
    printf("Enter force on 4 in kN:\n");
    scanf("%f",&dforce);
    printf("Enter force on 5 in kN:\n");
    scanf("%f",&eforce);
    printf("Enter angle /_412:\n");
    scanf("%f",&angle);
    sina=sin(3.14*angle/180);
    cosa=cos(3.14*angle/180);
    Fdb=bforce/sina;
    Feb=Fdb;    
    Fda=(-1)*Fdb;
    Fec=(-1)*Feb;
    Fda-=dforce*(sina);
    Fdb+=dforce*(sina);
    Feb+=eforce*(sina);
    Fec-=eforce*(sina);
    Fde=(-1)*(Fdb*cosa);
    Fab=(-1)*Fda*(cosa);
    Fbc    =(-1)*Fec*(cosa);
    r3=(dforce+2*bforce+3*eforce)/4;
    r1=dforce+eforce+bforce-r3;
    printf("force b/w 1&2 is:%fkN\n",Fab);
    printf("force b/w 2&3 is:%fkN\n",Fbc);
    printf("force b/w 1&4 is:%fkN\n",Fda);
    printf("force b/w 4&2 is:%fkN\n",Fdb);
    printf("force b/w 4&5 is:%fkN\n",Fde);
    printf("force b/w 5&2 is:%fkN\n",Feb);
    printf("force b/w 5&3 is:%fkN\n",Fec);
    printf("R1 is:%fkN\n",r1);
    printf("R3 is:%fkN\n",r3);
    return 0;
}
