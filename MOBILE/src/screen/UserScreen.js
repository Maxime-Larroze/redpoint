import React,{useEffect,useState}from 'react';
import {View,Text, TouchableOpacity,ScrollView  } from 'react-native';
import { ListItem } from 'react-native-elements'
import { Card,Icon } from 'react-native-elements';
import { color } from 'react-native-reanimated';
import {observer,inject} from 'mobx-react';
import { Button } from 'react-native-elements';

const UserScreen = (props) => {
    const {route,navigation}=props;
    const {storeRed}=props;
    const [user,setUser]=useState({});
    const [sexe,setSexe]=useState();
    const [MyAlert,setAlerte]=useState([]);
    useEffect(() => {
        
        const data=storeRed.getuser();
        setUser(data[0]);
        switch (user.civilite) {
          case 0:
            setSexe('Femme');
            break;          
          case 1:
            setSexe('Homme');
            break;
          default:
            setSexe('Indéterminé');
            break;
        }
    });
      return (
        <View  style={{flex:1, margin:5, marginTop:20}}>
            <ScrollView >
                <Card>
                  <Card.Title>Profil</Card.Title>
                  <Card.Divider/>
                    <Card.Title>Nom - Prénom</Card.Title>
                    <Text>{user.nom} {user.prenom}</Text>                        
                  <Card.Divider/>
                    <Card.Title>Sexe</Card.Title>
                    <Text>{sexe}</Text>                
                  <Card.Divider/>
                    <Card.Title>Adresse</Card.Title>
                    <Text>{user.adresse} </Text>  
                  <Card.Divider/>
                    <Card.Title>Email</Card.Title>
                    <Text>{user.email} </Text>
                  <ScrollView>
                    {MyAlert?.map((interventions,index)=>{
      
                    return (
                      <View style={{justifyContent: 'center',alignItems: 'center',flexDirection: 'row'}}>

                        <Text>{interventions}</Text>
                        <Button
                        title="Ajouter"
                        onPress={()=>{}}
                      />
                      </View>

                    )
                })}
                  </ScrollView>
                </Card>
            </ScrollView>


          <TouchableOpacity style={{margin:15, activeOpacity:0.5, backgroundColor:'#4178ff', borderRadius:10, padding:20}} onPress={()=>{navigation.goBack();}}>
            <Text style={{textAlign:'center', color:'white'}}>Retour</Text>
          </TouchableOpacity>
          
        </View>
    )

};

export default inject('storeRed')(observer(UserScreen))
