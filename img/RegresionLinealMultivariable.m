close all
clear all
%x=[1 2 3];
%y=[1 2 3];
datos=load('datos.txt');
x=datos(:,1);
y=datos(:,2);
m=numel(x);
x=[ones(m,1),x]; 
figure(1)
plot(x,y,'k o','MarkerFaceColor','y','MarkerSize',10)
hold on

%Parametros
d = size(x);
a=zeros(d(2)+1,1);
a0=0;
a1=0;
beta=0.023;
maxIter=200;
iter=1;
%%%% Calcular la hipotesis

h=a0 + a1*x;
J=(1/(2*m))*sum((h-y).^2);
figure(1)
plot(x,h,'g')

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%Gradica del error

low=-10;
up=10;
eje_a0=linspace(low,up,50);
eje_a1=linspace(low,up,50);
eje_J=[];

for i=1:numel(eje_a0)
    for j=1:numel(eje_a1)
        h=eje_a0(i)+eje_a1(j)*x;
        eje_J(i,j) = (1/(2*m))*sum((h-y).^2);
    end
end     
[eje_a1_,eje_a0_]=meshgrid(eje_a0,eje_a1);
 
figure(4)
surf(eje_a0_,eje_a1_,eje_J);
hold on
xlabel('a0')
ylabel('a1')
zlabel('J')

plot3(a0,a1,J,'k o','MarkerFaceColor','r','MarkerSize',10)
%%%%%%%%%%%%%%%%%%%%%

while(iter<maxIter)
    a0 = a0-beta*(1/m)*sum(h-y);
    a1 = a1-beta*(1/m)*sum((h-y).*x);
    h=a0 +a1*x;
    J=(1/(2*m))*sum((h-y).^2);
    figure(1)
    plot(x,h,'g')
    convergencia(iter)=J;
    figure(2)
    plot(convergencia,'*');
    hold on
    figure(4)
    plot3(a0,a1,J,'k o','MarkerFaceColor','r','MarkerSize',10)
    iter=iter+1;
end

figure(3)
plot(x,y,'k o','MarkerFaceColor','y','MarkerSize',10)
hold on
plot(x,h,'m')
%%Valores
display(['J:',num2str(J),'a0: ',num2str(a0)])
J
a0
a1
%%ProbarElModelo
datoPrueba=14.908;
h=a0 + a1*datoPrueba;
figure(3)
plot(datoPrueba,h,'k o','MarkerFaceColor','r','MarkerSize',10)

