import React from 'react';
import {TouchableOpacity } from 'react-native';
import { Icon } from 'react-native-elements';
import { createStackNavigator } from '@react-navigation/stack';
import Mapscreen from '../../screen/MapScreen';
const RootStack = createStackNavigator();
const StackNavigation = (props) => {
  const{navigation}=props;
  return (
      <RootStack.Navigator >

        <RootStack.Screen
          name="Mapscreen"
          component={Mapscreen}
          options={() => ({
            title: 'Bienvenue ',
            headerLeft: () =>(
              <TouchableOpacity onPress={() => navigation.openDrawer()}>
              <Icon raised name='list' type='material-icons'/>
              </TouchableOpacity>
            ),
            })}
        />
        
      </RootStack.Navigator>
  );
}
export default StackNavigation