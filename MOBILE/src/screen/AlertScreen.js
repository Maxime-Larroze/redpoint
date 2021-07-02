import  React, { useContext,useState, useEffect, Component } from 'react';
import { StyleSheet, Text, View, Image, TouchableOpacity, SafeAreaView, TextInput, Alert} from 'react-native';
import BoutonList from '../component/BoutonList'
import {observer,inject} from 'mobx-react';
import { Header } from 'react-native-elements';
import ApiContext, { Api } from '../api/Request'

const AlertScreen =(props)=>{ 
    const {storeRed,navigation}=props;
    const [ButtonList,SetbuttonList]=useState([]);
    const context=useContext(ApiContext)  

    useEffect(()=>{
      const user=storeRed.getuser()
      context.GetTypeInter(user.Token,user[0].id).then(data=>{
        SetbuttonList(data)
      })

    },[])


    return(
    <View style={{flex:1}}>
      <Header
        placement="left"

        rightComponent={{ text: 'Redpoint', style: { color: '#fff' } }}
        leftComponent={{ icon: 'home', color: '#fff',onPress:()=>{ 
          navigation.toggleDrawer();
        } }}
      />        
      <BoutonList TypeAlerte={ButtonList} function={context}/>
    </View>
    )}
export default inject('storeRed')(observer(AlertScreen))