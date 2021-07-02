import React,{useState,useEffect,useContext} from 'react'
import MapView from 'react-native-maps'
import { StyleSheet, Dimensions,Platform,View,Text } from 'react-native'
import {Marker} from 'react-native-maps'
import * as Location from 'expo-location';
import Constants from 'expo-constants';
import { Header } from 'react-native-elements';
import {observer,inject} from 'mobx-react';
import ApiContext, { Api } from '../api/Request'
import { Button, Overlay } from 'react-native-elements';
import Icon from 'react-native-vector-icons/FontAwesome';
const height = Dimensions.get('window').height

const MapScreen = (props) => {
  const context=useContext(ApiContext)  
  const {navigation}=props;
  const {storeRed}=props
  const [marker,SetMarker]=useState([])
  const [errorMsg, setErrorMsg] = useState(null);
  const [GeoLocation,setlocation]=useState({})
  const [visible, setVisible] = useState(false);
  const [aMarker,SetAMarker]=useState({})
  const isEmpty=(obj)=> {
     for(var key in obj) {
         if(obj.hasOwnProperty(key))
           return false;
        }
     return true;
  }
  //J'ouvre la modal
  const toggleOverlay = (aMarker) => {
    SetAMarker(aMarker)
    setVisible(!visible);
  };  
  const toggle = () => {
    setVisible(!visible);
  };
  useEffect(() => {
    //je récupère les coordonée gps
    (async () => {
      if (Platform.OS === 'android' && !Constants.isDevice) {
        setErrorMsg(
          'Oops, this will not work on Snack in an Android emulator. Try it on your device!'
        );
        return;
      }
      let { status } = await Location.requestForegroundPermissionsAsync();
      if (status !== 'granted') {
        setErrorMsg('Permission to access location was denied');
        return;
      }

      const location = await Location.getCurrentPositionAsync({});
      setlocation(location)
      storeRed.setLatitude(location.coords.latitude.toString())
      storeRed.setLongitude(location.coords.longitude.toString())
    })();
    //Si je suis sur émulateur je fixe les coordonée par défaut
    if (isEmpty(GeoLocation)) {
      storeRed.setLatitude("45.764043");
      storeRed.setLongitude("4.835659");
  
    } 

    const user=storeRed.getuser();
    //Je récupère toute les alerte 
    context.GetNearAlert(user[0].latitude,user[0].longitude,user.Token,user[0].id).then(data=>{
      data?.forEach(newMarker => {
        const object={
          coordinate:{
          latitude:newMarker.latitude,
          longitude:newMarker.longitude,
          ID:newMarker.id,
          typeIntervention:newMarker.type_intervention_id,
          nb_intervenant:newMarker.nb_intervenant
        },
        
      }
        SetMarker(
          [
            ...marker,
            object
          ]
        )
      });  
    })
  }, []);


  return(
    <View>
      <Header
        placement="left"

        rightComponent={{ text: 'Redpoint', style: { color: '#fff' } }}
        leftComponent={{ icon: 'home', color: '#fff',onPress:()=>{ 
          navigation.toggleDrawer();
        } }}
      />
    <MapView
        style={styles.map}
        loadingEnabled={true}
        region={{
          latitude: storeRed.ParsedLatitude,
          longitude: storeRed.ParsedLongitude,
          latitudeDelta: 0.05,
          longitudeDelta: 0.05
        }}
  >
    
       {marker?.map((marker,index)=>{
         //La liste de tout les intervention
      return (<Marker key={index} { ...marker}  onPress={()=>{toggleOverlay(marker)}}/>)
    })}
    
  </MapView>

<Overlay isVisible={visible} onBackdropPress={toggle}>
  <Text style={{fontSize:20}}>Voulez vous vous occuper de cette alerte ? </Text>
  <Button
  title="Ajouter"
  onPress={()=>{   
    //Si l'utilisateur clique alors je l'ajoute
    const user=storeRed.getuser();
    if (aMarker.coordinate.nb_intervenant>0) {
      context.PutAnUserOnAlert(user[0].id, aMarker.coordinate.ID,true,user.Token).then(res=>{
      })

    }else{
      context.PutAnUserOnAlert(user[0].id, aMarker.coordinate.ID,false,user.Token).then(res=>{
        console.log(res)
      })
    }

    setVisible(false);
  }}
/>

</Overlay>
  </View>
  )


}

const styles = StyleSheet.create({
  map: {
    height
  }
})

export default inject('storeRed')(observer(MapScreen))
