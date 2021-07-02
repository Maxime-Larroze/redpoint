import React from "react";
import axios from "axios";
import AsyncStorage from "@react-native-async-storage/async-storage";
import store from "../store/Storage";
const URI = "http://sys-ex.ddns.net:35100/";
const PATH = "api/v1/";
const STORE = store;
const Axios = axios.create({
  baseURL: URI + PATH,
  timeout: 1000
});

const Api = {
  Login: async (Identifiant, Password) => {
    try {
      const res = await Axios.post('public/login', {
        identifiant: Identifiant,
        password: Password
      });
      const {data} = res;
      
      return data;
    } catch (e) {
      console.log(e);
    }
  },
  Logo: async () => {
    try {
      const res = await Axios.get("public/logo");
      const {data} = res;
      return data;
    } catch (error) {
      console.log(error);
    }
  },
  SendAlert: async (latitude,longitude,token,idUser,idInter) => {
    try {   
      const response = await Axios.post(`auth/interventions`,
        {
        user_id:parseInt(idUser),
        latitude:latitude,
        longitude:longitude,
        type_intervention_id:parseInt(idInter)
      }, { 
        headers: { Authorization: `Bearer ${token}` }},
        );
      const {data}=response;
      return data;
    } catch (error) {
      console.log(error);
    }
  }  ,
  GetNearAlert: async (latitude,longitude,token,id) => {
    try {
      const response= await Axios.get(`auth/interventions/${latitude},${longitude}/${id}`,{ headers: { Authorization: `Bearer ${token}` }})
      const {data}=response;
      return data;
    } catch  {
      console.log("Une erreur est survenue");
    }
  },
    GetTypeInterByID: async (token,id) => {
    try {
      
      const response= await Axios.get(`auth/types/${id}`,{ 
        headers: { 
          "Authorization" : `Bearer ${token}`     }})
      const {data}=response;
      return data;
    } catch  {
      console.log("Une erreur est survenue");
    }
  },
    GetTypeInter: async (token) => {
    try {

      const response= await Axios.get(`auth/types`,{ 
        headers: { 
          "Authorization" : `Bearer ${token}`     }})
      const {data}=response;
      return data;
    } catch  {
      console.log("Une erreur est survenue veuillez réssayez");
    }
  },
  GetNewToken:async(identifiant)=>{
    try {
      const response= await Axios.post(`token/verify`,{user_id:parseInt(identifiant)})
      const {data}=response;
      return data;
    } catch (error) {
      console.log(error)
    }
  },
  PutAnUserOnAlert:async(idUser,idInter,intervention_ack,token)=>{
    try {
      const response=await Axios.put('auth/interventions',{
        user_id:parseInt(idUser),
        intervention_id:parseInt(idInter),
        intervention_ack:intervention_ack
      }, { 
        headers: { Authorization: `Bearer ${token}` }},
        );
      const {data}=response;
      return data; 
    } catch (error) {
      console.log(error)
    }
  }
};

const ApiContext = React.createContext(Api);
export {
  Api
};
export default ApiContext;
