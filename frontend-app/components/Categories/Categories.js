"use client"

import axios from "axios";
import Link from "next/link";
import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
import styles from './categories.module.css';

export default function Categories(){
    const {i18n} = useTranslation();
    const currentLanguage = i18n.language;

    const [categories, setCategories] = useState([]);

    useEffect(()=>{
        getCategories();
        
    },[])

    const getCategories = async ()=>{
        try{
            const res = await axios.get("http://127.0.0.1:8000/api/categories")
            if(res.data.status === 200){
                setCategories(res.data.categories)
                console.log(res.data.categories);
                
                console.log(1);
                
            }else{
                console.log(res.data.message);
                console.log(2);
                
                
            }
        }
        catch(error){
            console.log(error);
            
        }
    }
    return(
        <div className={styles.Categories} >
            
            {categories.map((category)=>{
                const translation =
          category.translations.find((t) => t.locale === currentLanguage) ||
          category;
          return(
                    <div key={category.id} className={styles.Category} >
                        <Link className={styles.Link} href={'/categories/'+ category.id}>{translation.title}</Link>
                    </div>
          )
            })}
        </div>
    )
}