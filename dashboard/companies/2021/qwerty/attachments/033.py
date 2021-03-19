
#data pre processing program
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
df=pd.read_csv("Data.csv")
X=df.iloc[:,:-1].values
y=df.iloc[:,-1].values

#taking care of missing data
from sklearn.impute import SimpleImputer
imputer=SimpleImputer(missing_values=np.nan , strategy ="mean" )
imputer= imputer.fit(X[:,1:3])
X[:,1:3] = imputer.transform(X[:,1:3]) 
print(X)


#Encoding categorical values
#Encoding independent variable
from sklearn.preprocessing import LabelEncoder,OneHotEncoder
labelencoder_X= LabelEncoder()
X[:,0]=labelencoder_X.fit_transform(X[:,0])#Assigns numerical value to text
onehotencoder=OneHotEncoder(categorical_features=[0])#since there were 3 values hence we use onehotencoder
X=onehotencoder.fit_transform(X).toarray()


#Encoding dependent variable
labelencoder_y=LabelEncoder()
y=labelencoder_y.fit_transform(y)#Assigns numerical value to text
#here only two values are there hence no onehotencoder

#Feature scaling-all on the same scale
from sklearn.preprocessing import StandardScaler#we want the values of same scale 
sc_X=StandardScaler()
X=sc_X.fit_transform(X)

sc_y=StandardScaler()
y=y.reshape(1,-1)
y=sc_y.fit_transform(y)



#splitting dataset into training and test set
from sklearn.model_selection import train_test_split
X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.2,random_state=0)









# -*- coding: utf-8 -*-
"""
Created on Mon Feb  3 09:15:51 2020

@author: WC-NEW-LAB


# data preprocessing

#importing libraries
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

#importing dataset
dataset = pd.read_csv("Data.csv")
X = dataset.iloc[:,:-1].values
y = dataset.iloc[:,3].values

#taking care of missing data
from sklearn.preprocessing import Imputer
imputer = Imputer(missing_values='NaN',strategy='mean',axis=0)
imputer = imputer.fit(X[:,1:3])
X[:,1:3] = imputer.transform(X[:,1:3])


#Encoding categorical values
#Encoding independent variable
from sklearn.preprocessing import LabelEncoder,OneHotEncoder
labelencoder_X= LabelEncoder()
X[:,0]=labelencoder_X.fit_transform(X[:,0])#Assigns numerical value to text
onehotencoder=OneHotEncoder(categorical_features=[0])#sice there were 3 values hence we use onehotencoder
X=onehotencoder.fit_transform(X).toarray()

#Encoding dependent variable
labelencoder_y=LabelEncoder()
y=labelencoder_y.fit_transform(y)#Assigns numerical value to text
#here only two values are there hence no onehotencoder


#splitting dataset into training and test set
from sklearn.model_selection import train_test_split
X_train,X_test,y_train,y_test=train_test_split(X,y,test_size=0.2,random_state=0)




#Feature scaling-all on the same scale
from sklearn.preprocessing import StandardScaler#we want the values of same scale 
sc_X=StandardScaler()
X_train=sc_X.fit_transform(X_train)
X_test=sc_X.fit_transform(X_test)
sc_y=StandardScaler()
#y.reshape(1,-1)
y_train=sc_y.fit_transform(y_train)
"""