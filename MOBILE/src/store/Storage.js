import {observable,action, makeObservable,computed} from 'mobx'
import AsyncStorage from '@react-native-async-storage/async-storage';
import { ActivityIndicatorComponent } from 'react-native';
class Store {

    logo='';
    latitude=0;
    longitude=0;
    connected=false;
    AlertList=[];
    user={};
    getAlertList=()=>{
        return this.AlertList
    }
    addAlertList=(alert)=>
    {
        this.AlertList.add(alert)
    }
    deleteFromAlertlist=(index)=>{this.AlertList.splice(index, 1);}
    
    getuser=()=>{
        return this.user;
    }    
    setuser=(user)=>{
         this.user=user;
    }

    setConnected(isConnected){
         this.connected=isConnected;
    }

    get getConnected(){
        return this.connected;
    }
    get ParsedLatitude(){
        return parseFloat(this.latitude);
    }
    get ParsedLongitude(){
        return parseFloat(this.longitude);
    }
    getLogo=()=>{return this.logo;}
    setLogo=(logo)=>{this.logo=logo;}

    getLatitude=()=>{return this.latitude;}
    setLatitude=(latitude)=>{this.latitude=latitude;}

    getLongitude=()=>{return this.latitude;}
    setLongitude=(longitude)=>{this.longitude=longitude;}

    

    storeData = async (user) => {
        try {

            const jsonValue = JSON.stringify(user);
            await AsyncStorage.setItem('@redpointIdentifier', jsonValue);
        } catch (e) {
            // saving error
        }
    }
   
      getData = async () => {
        try {
        const jsonValue = await AsyncStorage.getItem('@redpointIdentifier')
        return JSON.parse(jsonValue);
        } catch(e) {
          console.log(e);
        }
    }
    constructor(){
        makeObservable(this,{
            user:observable,
            getAlertList:observable,
            AlertList:observable,
            setConnected:action,
            connected:observable,
            addAlertList:action,
            getConnected:computed,
            ParsedLatitude:computed,
            ParsedLongitude:computed,
            latitude:observable,
            longitude:observable,
            getData:action,
            storeData:action,

        });
    }
}

const storeRed = new Store();
export default storeRed;