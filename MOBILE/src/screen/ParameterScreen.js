import  React, { useContext,useState, useEffect, Component } from 'react';
import { StyleSheet, Text, View, Image, TouchableOpacity, SafeAreaView, TextInput, Alert, Switch} from 'react-native';
import {Requete} from '../api/Request';
import { useNavigation } from '@react-navigation/native';
import store from '../store/Storage';

// import { Switch } from 'react-native-switch';
const ParameterScreen = (props) => {
  const [Logo, setLogo] = useState();

  const navigation=useNavigation();
//   const {store}=props;
  const [LocalisationIsEnabled, setLocalisationIsEnabled] = useState(false);
  const [LoginIsEnabled, setLoginIsEnabled] = useState(false);
  const toggleSwitchLogin = () => setLoginIsEnabled(previousState => !previousState);
  const toggleSwitchLocalisation = () => setLocalisationIsEnabled(previousState => !previousState);
  const [Identifiant,setIdentifiant]=useState(''); 
  const [Password,setPassword]=useState(''); 

  // const prechargement = async () => {
  //   const data = store.getData();
  //   console.log('prechargement JSON: '+JSON.parse(data));
  //   return data;
  // };

  // useEffect(() => prechargement(), []);

  return (
    <SafeAreaView>
        <View style={styles.container}>
            {/* <Text style={styles.title}>Redpoint</Text> */}
            <Image source={{uri: Logo}} style={styles.image} />
            <TextInput onChangeText={(value)=>{setIdentifiant(value)}} value={Identifiant} style={styles.input} underlineColorAndroid="transparent" placeholderTextColor="red" autoCapitalize="none" placeholder='Votre identifiant' />
            <TextInput onChangeText={(value)=>{setPassword(value)}} value={Password} style={styles.input} underlineColorAndroid="transparent" placeholderTextColor="red" autoCapitalize="none" placeholder='Votre mot de passe' secureTextEntry={true}/>
            <Text style={styles.textSwitch}>Autoriser la localisation précise (1 mètre)
                <Switch style={styles.switch} trackColor={{ false: "#767577", true: "#81b0ff" }} thumbColor={LocalisationIsEnabled ? "blue" : "#f4f3f4"} ios_backgroundColor="#3e3e3e" onValueChange={toggleSwitchLocalisation} value={LocalisationIsEnabled} />
            </Text>
            <Text style={styles.textSwitch}>Autoriser la connexion automatique
                <Switch style={styles.switch} trackColor={{ false: "#767577", true: "#81b0ff" }} thumbColor={LoginIsEnabled ? "blue" : "#f4f3f4"} ios_backgroundColor="#3e3e3e" onValueChange={toggleSwitchLogin} value={LoginIsEnabled} />
            </Text>
            <TouchableOpacity style={styles.submitButton} onPress={()=>{connexion(Identifiant,Password)}}>
              <Text style={styles.submitButtonText}> Sauvegarder </Text>
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
   },
   textSwitch: {
    textAlign:'center',
    alignItems: 'center',
    alignContent: 'center',
    alignSelf: 'center',
    fontSize: 12,
   },
   switch: {
    textAlign: 'right',
   }
  });
export default ParameterScreen
