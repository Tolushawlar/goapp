import React,  {Component } from 'react'
import classes from './prelaunch.module.css'
// import DummyPic from '../../assets/Mask.png'
// import { MdStore } from "react-icons/md";

class PreLaunch extends Component {



   render(){

      return(
         <div className={classes.PreLaunch}>
            <div className={classes.Container}>
               <div className={classes.Header}>
                  <div className={classes.Title}>BAM<span className={classes.ZI}>ZI</span></div>
                  <div>
                     <ul className={classes.List} >
                        <li>Contact Us</li>
                        <li>Features</li>
                     </ul>
                  </div>
               </div>

               <div className={classes.flex}>
                  <div className={classes.content}>
                     <div>
                        <span className={classes.caption}>Get Ready, Online stores coming Through</span>
                        <p className={classes.subcaption}>Get amazing rewards and discounts as you become amongst the first to explore our new and vast digital market.</p>
                     </div>

                     <div className={classes.form}>

                        <p>Get latest updates on Bamzi</p>

                        <div  className={classes.btn}>
                           <input type="text" placeholder="Email here" className={classes.email} />
                           <button className={classes.btnSend}> Send </button>
                        </div>



                        <button className={classes.btnRes}>
                           <div className={classes.btnAlgn}>
                              <MdStore />
                              <span className={classes.btnResText}>  Book your online store </span>
                           </div>
                        </button>

                     </div>


                  </div>

                  <div className={classes.DummyPic}>

                     <img src={DummyPic} alt="DummyPic"  />

                  </div>
               </div>
            </div>
         </div>
      )

   }

}

export default PreLaunch
