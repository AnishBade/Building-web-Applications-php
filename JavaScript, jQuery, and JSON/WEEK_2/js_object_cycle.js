function PartyAnimal(nam){
    this.x=0;
    this.name=nam;
    console.log("Built "+ nam);
    this.party=function(){
        this.x=this.x+1;
        console.log(nam +"= "+this.x);
    }

}
s=new PartyAnimal('anish');
s.party();

j=new PartyAnimal('bade');
j.party();
s.party();
j.party();