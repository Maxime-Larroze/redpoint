import  React, { useContext } from 'react';
import { Text, View, TouchableOpacity} from 'react-native';
import {Requete} from '../api/Request';
import { useNavigation } from '@react-navigation/native';
import ApiContext, { Api } from '../api/Request'
import {observer,inject} from 'mobx-react';
import Constants from 'expo-constants';

const BoutonList=(props)=>{
    const {TypeAlerte,storeRed}=props;
    const context=useContext(ApiContext)  
    const SendAlert=(idAlerte)=>{
      getLatLong().then(res=>{
        const user=storeRed.getuser();
        context.SendAlert(res.object.latitude,res.object.longitude,user.Token,user[0].id,idAlerte).then(res=>{
          console.log(res)
        })
      })
    }
    getLatLong =async () => {
        if (Platform.OS === 'android' && !Constants.isDevice) {
          const object={
            latitude:"45.764043",
            longitude:"4.835659"
          }
          return{
            object
          };
        }
        if (status !== 'granted') {

          const object={
      
            latitude:"45.764043",
            longitude:"4.835659"
          }
          return{
            object
          };
        }
        const location = await Location.getCurrentPositionAsync({});
        storeRed.setLatitude(location.coords.latitude.toString())
        storeRed.setLongitude(location.coords.longitude.toString())
        const object={  
          latitude:location.coords.latitude.toString(),
          longitude:location.coords.longitude.toString()
        }
        return{object}
      }
    return(
        <View style={{flex:1,flexDirection: "column",justifyContent:'space-around'}}>
        {
        TypeAlerte?.map((alerte)=>{
            
            return(
                <TouchableOpacity style={{flex:1,borderColor:"#"+alerte.couleur,borderWidth: 10, marginBottom:0,justifyContent: 'center'}} key={alerte.id} onPress={()=>{SendAlert(alerte.id)}}>
                    <Text style={{textAlign:"center",fontSize:25}}>{alerte.libelle}</Text>
                </TouchableOpacity>
            )
          })}
        </View>

    )
}
export default inject('storeRed')(observer(BoutonList))