import React from 'react';
import {TouchableOpacity } from 'react-native';
import { Icon } from 'react-native-elements';
import { createStackNavigator } from '@react-navigation/stack';
import DrawerNavigation from './DrawerNavigation';
const RootStack = createStackNavigator();
const StackNavigation = (props) => {
  return (
      <RootStack.Navigator >

        <RootStack.Screen
          name="DrawerNavigation"
          component={DrawerNavigation}
          />

      </RootStack.Navigator>
  );
}
export default StackNavigation