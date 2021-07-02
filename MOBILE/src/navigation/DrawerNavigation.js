import React ,{ useState,useEffect, useContext}from 'react';
import {createDrawerNavigator} from '@react-navigation/drawer';
import LoginScreen from '../screen/LoginScreen';
import ParameterScreen from '../screen/ParameterScreen';
import Icon from 'react-native-vector-icons/Ionicons';
import { Platform } from 'react-native';
import TabNavigation from '../navigation/Tabnavigation'
import {observer,inject} from 'mobx-react';
import { createStackNavigator } from '@react-navigation/stack';
import UserScreen from '../screen/UserScreen'
import ApiContext, { Api } from '../api/Request'

const RootStack = createStackNavigator();
const Drawer=createDrawerNavigator();

const DrawerNavigation = (props) => {
const context=useContext(ApiContext)
const {storeRed}=props
useEffect(()=>{
    
  storeRed.getData().then(res=>{
    if (res.Token) {
      context.GetNewToken(res[0].id).then(data=>{
        if (data.Token) {
          storeRed.setConnected(true);
          storeRed.setuser(data);
          storeRed.storeData(data)

        }
      })
      

    }
  }).catch(err=>{console.log(err)})
},[storeRed.connected])
  if(storeRed.getConnected)
  {
    return (
      <Drawer.Navigator >
        <Drawer.Screen name="TabNavigation" component={TabNavigation}  />     
        <Drawer.Screen name="Menu" component={UserScreen} options={{ drawerIcon: config => <Icon size={23} color="red" name={Platform.OS === 'android' ? 'log-in' : 'ios-log-in'}></Icon> }}/>
        
      </Drawer.Navigator>
    );
  }
  else {
    return (
      <RootStack.Navigator>
          <RootStack.Screen name="LoginScreen" component={LoginScreen} options={{ headerShown: false }}/>
      </RootStack.Navigator>
     
    );
  }

}

export default inject('storeRed')(observer(DrawerNavigation))
