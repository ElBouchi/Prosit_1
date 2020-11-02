#include <iostream>
#include <math.h>
using namespace std;

double Xa, Xb, Ya, Yb;

class Euclidienne {
public:
    double Xa, Xb, Ya, Yb;
    void afficher() {
        double Distance = sqrt(pow(Xb - Xa, 2) + pow(Yb - Ya, 2));
        cout << "la distance Euclidienne entre ces deux points est de : " << Distance << endl;
    }
};

class Tchebychev {
public:
    double Xa, Xb, Ya, Yb;
    void afficher() {
        double Distance = fmax((abs(Xb - Xa)), (abs(Yb - Ya)));
        cout << "la distance Tchebychev entre ces deux points est de : " << Distance << endl;
    }
};

class Manhattan {
public:
    double Xa, Xb, Ya, Yb;
    void afficher() {
        double Distance = abs(Xb - Xa) + abs(Yb - Ya);
        cout << "la distance Manhattan entre ces deux points est de : " << Distance << endl;
    }
};

int main()
{
    Euclidienne Eucl;
    Tchebychev Tcheb;
    Manhattan Manh;

    cout << "Entrez les coordoonees du point A : \n";
    cin >> Xa >> Ya;
    cout << "Les coordoonees du point A sont : \n";
    cout << Xa << "," << Ya << "\n";
    cout << "Entrez les coordonnees du point B : \n";
    cin >> Xb >> Yb;
    cout << "Les coordoonees du point B sont : \n";
    cout << Xb << "," << Yb << "\n";

    Eucl.Xa = Xa, Eucl.Xb = Xb, Eucl.Ya = Ya, Eucl.Yb = Yb;
    Tcheb.Xa = Xa, Tcheb.Xb = Xb, Tcheb.Ya = Ya, Tcheb.Yb = Yb;
    Manh.Xa = Xa, Manh.Xb = Xb, Manh.Ya = Ya, Manh.Yb = Yb;

    Eucl.afficher();
    Tcheb.afficher();
    Manh.afficher();

}

