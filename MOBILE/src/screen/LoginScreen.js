import  React, { useContext,useState, useEffect, Component } from 'react';
import { StyleSheet, Text, View, Image, TouchableOpacity, SafeAreaView, TextInput, Alert} from 'react-native';
import { useNavigation } from '@react-navigation/native';
import {observer,inject} from 'mobx-react';
import ApiContext, { Api } from '../api/Request'


const LoginScreen = (props) => {
  const navigation=useNavigation();
  const {storeRed}=props;
  const context=useContext(ApiContext)  
  const [Identifiant,setIdentifiant]=useState(''); 
  const [Password,setPassword]=useState(''); 
  const [Logo, setLogo] = useState();
  context.Logo().then((res)=>{
    setLogo(res.url);
  }).catch(function(error) { console.log(error);})

  const connexion = (Identifiant,Password)=>{
    if(Identifiant!='' && Password!="")
    {
      context.Login(Identifiant,Password,storeRed).then(data=>{
        if (data.Token) {
          storeRed.setConnected(true);
          storeRed.setuser(data);
          storeRed.storeData(data)
        }
        }).catch(err =>{
        Alert.alert('Erreur',err);          
      })
    }
  }

  return (
    <SafeAreaView>
        <View style={styles.container}>
            {/* <Text style={styles.title}>Redpoint</Text> */}
            <Image source={{uri: Logo }} style={styles.image} />
            <TextInput onChangeText={(value)=>{setIdentifiant(value)}} value={Identifiant} style={styles.input} underlineColorAndroid="transparent" placeholderTextColor="red" autoCapitalize="none" placeholder='Identifiant' />
            <TextInput onChangeText={(value)=>{setPassword(value)}} value={Password} style={styles.input} underlineColorAndroid="transparent" placeholderTextColor="red" autoCapitalize="none" placeholder='Mot de passe' secureTextEntry={true} />
            <TouchableOpacity style={styles.submitButton} onPress={()=>{connexion(Identifiant,Password)}}>
              <Text style={styles.submitButtonText}> Se connecter </Text>
            </TouchableOpacity>
        </View>
      </SafeAreaView>
    );  
};

const styles = StyleSheet.create({
    container: {
      flex: 1,
      paddingTop: 23
    },
    buttonStyle: {
        alignItems: 'center',
        backgroundColor: '#f4511e',
        padding: 10,
        marginVertical: 10,
      },
    image: {
      marginTop:90,
      marginBottom:30,
      resizeMode: 'contain',
      alignItems: 'center',
      justifyContent: 'center',
      padding: 1,
      width: 400, 
      height: 100
    },
    title: {
      textAlign:'center',
      fontSize: 40,
      fontWeight: "bold",
      marginTop:50,
    },
    input: {
      margin: 15,
      height: 40,
      borderWidth: 1,
      borderRadius: 20,
      textAlign:'center',
    },
    submitButton: {
      backgroundColor: 'red',
      margin: 25,
      height: 40,
      borderWidth: 0,
      borderRadius: 20,
      textAlign:'center',
      alignItems: 'center',
      justifyContent: 'center',
   },
   submitButtonText:{
      color: 'white'
   }
  });
  export default inject('storeRed')(observer(LoginScreen))
