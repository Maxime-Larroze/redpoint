import React from 'react';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import Mapscreen from '../screen/MapScreen';
import AlertScreen from '../screen/AlertScreen';

const TabNav = createBottomTabNavigator();
const TabNavigation = (props) => {
  return (
    <TabNav.Navigator>
      <TabNav.Screen
          name="Mapscreen"
          component={Mapscreen}
        />
      
      <TabNav.Screen
        name="AlertScreen"
        component={AlertScreen}
      />

    </TabNav.Navigator>
  );
}

export default TabNavigation