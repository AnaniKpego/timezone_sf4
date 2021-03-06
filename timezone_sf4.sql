PGDMP     (                    w            timezone_sf4    11.4    11.4 "    .           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            /           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            0           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            1           1262    33107    timezone_sf4    DATABASE     �   CREATE DATABASE timezone_sf4 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'French_France.1252' LC_CTYPE = 'French_France.1252';
    DROP DATABASE timezone_sf4;
             postgres    false            �            1259    41298 	   continent    TABLE     �   CREATE TABLE public.continent (
    id integer NOT NULL,
    nom_fr character varying(255) NOT NULL,
    nom_en character varying(255) NOT NULL
);
    DROP TABLE public.continent;
       public         postgres    false            �            1259    41296    continent_id_seq    SEQUENCE     y   CREATE SEQUENCE public.continent_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.continent_id_seq;
       public       postgres    false            �            1259    41309    fuseau    TABLE     �  CREATE TABLE public.fuseau (
    id integer NOT NULL,
    nom_fuseau character varying(255) NOT NULL,
    utc character varying(255) NOT NULL,
    fuseau_pays character varying(255) DEFAULT NULL::character varying,
    pays_fr character varying(255) DEFAULT NULL::character varying,
    villes_fr character varying(255) DEFAULT NULL::character varying,
    villes_en character varying(255) DEFAULT NULL::character varying
);
    DROP TABLE public.fuseau;
       public         postgres    false            �            1259    41303    fuseau_id_seq    SEQUENCE     v   CREATE SEQUENCE public.fuseau_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.fuseau_id_seq;
       public       postgres    false            �            1259    33108    migration_versions    TABLE     �   CREATE TABLE public.migration_versions (
    version character varying(14) NOT NULL,
    executed_at timestamp(0) without time zone NOT NULL
);
 &   DROP TABLE public.migration_versions;
       public         postgres    false            2           0    0 %   COLUMN migration_versions.executed_at    COMMENT     [   COMMENT ON COLUMN public.migration_versions.executed_at IS '(DC2Type:datetime_immutable)';
            public       postgres    false    196            �            1259    41317    pays    TABLE     .  CREATE TABLE public.pays (
    id integer NOT NULL,
    continents_id integer NOT NULL,
    nom_fr character varying(255) NOT NULL,
    nom_en character varying(255) NOT NULL,
    code integer NOT NULL,
    alpha_deux character varying(255) NOT NULL,
    alpha_trois character varying(255) NOT NULL
);
    DROP TABLE public.pays;
       public         postgres    false            �            1259    41305    pays_id_seq    SEQUENCE     t   CREATE SEQUENCE public.pays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.pays_id_seq;
       public       postgres    false            �            1259    41326    ville    TABLE     �   CREATE TABLE public.ville (
    id integer NOT NULL,
    pays_id integer NOT NULL,
    fuseau_id integer NOT NULL,
    nom_region character varying(255) NOT NULL
);
    DROP TABLE public.ville;
       public         postgres    false            �            1259    41307    ville_id_seq    SEQUENCE     u   CREATE SEQUENCE public.ville_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.ville_id_seq;
       public       postgres    false            %          0    41298 	   continent 
   TABLE DATA               7   COPY public.continent (id, nom_fr, nom_en) FROM stdin;
    public       postgres    false    198   �$       )          0    41309    fuseau 
   TABLE DATA               a   COPY public.fuseau (id, nom_fuseau, utc, fuseau_pays, pays_fr, villes_fr, villes_en) FROM stdin;
    public       postgres    false    202   �$       #          0    33108    migration_versions 
   TABLE DATA               B   COPY public.migration_versions (version, executed_at) FROM stdin;
    public       postgres    false    196   :M       *          0    41317    pays 
   TABLE DATA               `   COPY public.pays (id, continents_id, nom_fr, nom_en, code, alpha_deux, alpha_trois) FROM stdin;
    public       postgres    false    203   �M       +          0    41326    ville 
   TABLE DATA               C   COPY public.ville (id, pays_id, fuseau_id, nom_region) FROM stdin;
    public       postgres    false    204   �M       3           0    0    continent_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.continent_id_seq', 1, false);
            public       postgres    false    197            4           0    0    fuseau_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.fuseau_id_seq', 1, false);
            public       postgres    false    199            5           0    0    pays_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.pays_id_seq', 1, false);
            public       postgres    false    200            6           0    0    ville_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.ville_id_seq', 1, false);
            public       postgres    false    201            �
           2606    41302    continent continent_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.continent
    ADD CONSTRAINT continent_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.continent DROP CONSTRAINT continent_pkey;
       public         postgres    false    198            �
           2606    41316    fuseau fuseau_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.fuseau
    ADD CONSTRAINT fuseau_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.fuseau DROP CONSTRAINT fuseau_pkey;
       public         postgres    false    202            �
           2606    33112 *   migration_versions migration_versions_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.migration_versions
    ADD CONSTRAINT migration_versions_pkey PRIMARY KEY (version);
 T   ALTER TABLE ONLY public.migration_versions DROP CONSTRAINT migration_versions_pkey;
       public         postgres    false    196            �
           2606    41324    pays pays_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.pays
    ADD CONSTRAINT pays_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.pays DROP CONSTRAINT pays_pkey;
       public         postgres    false    203            �
           2606    41330    ville ville_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.ville
    ADD CONSTRAINT ville_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.ville DROP CONSTRAINT ville_pkey;
       public         postgres    false    204            �
           1259    41325    idx_349f3cae298246f6    INDEX     N   CREATE INDEX idx_349f3cae298246f6 ON public.pays USING btree (continents_id);
 (   DROP INDEX public.idx_349f3cae298246f6;
       public         postgres    false    203            �
           1259    41331    idx_43c3d9c3a6e44244    INDEX     I   CREATE INDEX idx_43c3d9c3a6e44244 ON public.ville USING btree (pays_id);
 (   DROP INDEX public.idx_43c3d9c3a6e44244;
       public         postgres    false    204            �
           1259    41332    idx_43c3d9c3c9ca355a    INDEX     K   CREATE INDEX idx_43c3d9c3c9ca355a ON public.ville USING btree (fuseau_id);
 (   DROP INDEX public.idx_43c3d9c3c9ca355a;
       public         postgres    false    204            �
           2606    41333    pays fk_349f3cae298246f6    FK CONSTRAINT     �   ALTER TABLE ONLY public.pays
    ADD CONSTRAINT fk_349f3cae298246f6 FOREIGN KEY (continents_id) REFERENCES public.continent(id);
 B   ALTER TABLE ONLY public.pays DROP CONSTRAINT fk_349f3cae298246f6;
       public       postgres    false    2717    198    203            �
           2606    41338    ville fk_43c3d9c3a6e44244    FK CONSTRAINT     w   ALTER TABLE ONLY public.ville
    ADD CONSTRAINT fk_43c3d9c3a6e44244 FOREIGN KEY (pays_id) REFERENCES public.pays(id);
 C   ALTER TABLE ONLY public.ville DROP CONSTRAINT fk_43c3d9c3a6e44244;
       public       postgres    false    2722    203    204            �
           2606    41343    ville fk_43c3d9c3c9ca355a    FK CONSTRAINT     {   ALTER TABLE ONLY public.ville
    ADD CONSTRAINT fk_43c3d9c3c9ca355a FOREIGN KEY (fuseau_id) REFERENCES public.fuseau(id);
 C   ALTER TABLE ONLY public.ville DROP CONSTRAINT fk_43c3d9c3c9ca355a;
       public       postgres    false    202    204    2719            %      x������ � �      )      x��}Ks9�޺�W��7��n�$�;��$)�VGwL�����JTg&�*��u�ᘍ�ww{��iz�cf,Ǆ�=^������w�|P*�,J#ET"��$pp^8 W:G*6�&���8���tgye�#�Cc]y��J���j}���?U����L��5��#�j\^3Ϥ:��[�,uO��O�.UH�����p���� �Z�ٗ[}5�|��:5���@o�o�̗��w�?�z��s���%����R�H�,��b��}n��J���o����[6ڨQyi�i^��NT����;�h���:�f��� ;0�ͺ�]��L:������Q�ɱ�,����^v�0I�;i���lMU�TxD��FN���j�i��xxd���`�*�s��3���W&ם�Jᣏ�D�B#��T�0�d
h2U��6kTT��ӹ��'�~���*c��~FORBe���_O>BN�R��2YO��|�������Ζ�۪?��UjF��}������K�rw���#j��H�H��&Z�M2ZY��:��;�J`��4k���;� ��.���he�n�[5r�zW�XxF+�|��=���½(����ʣ�]u������Q�����#Zy\�ٷ��V:�X�����n ]Ꞩ��k4�%�/m�}�)P�M�@��H�+F+�5�����S�����<�;���*1 �4�����Uf
�u+.�
j�z�J�h� U�a���_�L���@��K�7&.lF���T�f�G�ͪ�|Qcm�z.��&��4����YE2�k���CF\�R�j���	]?��lh�{�������E_-8R��*�,�8I���j��w�" =�g�j��9 7!n�E�ͺ�����T�����.^��u}������F��}�@���b%�T �ܰ(��6�w9=���}��c�>w���F�-ٕ��`8BYxF�ﳒ3���ܺOmVtO�/�T#�����?R�6�gW��
����s�B���Jz�@9���	D[�vO&4ؖː��j�j�q��c��:t��a�VP����� KX��Xs��.���X-Zm8��u�߂X�������\gc�.���ݔ������A��ځ����3y�����ʅ;���?K+�Z�C�H���'�P��Zà���������򇔊%y�'�B��B��}b�Z>Zkx��C�~~x^��L_���a��:K$�[!Zkx����Լ�k�0|��s���]L��%!U>Kt
����5��[���Qj��܉l����ZÙ���+pl0�,����m���������5>V�5�i<�J��ˍG��H�/)D*��58�@��JF��:ۉ�2��{p�hm�-���~t�\0��r�5�p�l����p��0�b��ZÑvl^��c$B�!�M*�z�5�xO��J��X���T'Zo��^rv��)�I�K�V"�V/h���=(����+���'R��6x�h�aj��m��j��9�@6�-?�x��O{Uj:|�3jH�����34���81U2��Ծ���?����b����Z�E~�-��t�@*?���D��-v�窱<DV&�M*@P�
A@o���c&��-~p��b���F�B�mfo�N�z*@m�H�n_is�*Ӕ�GF�����z�q�������s��7��@���}ׄԀP�3(wց�M�_/���f�fun�~�_��kF�[xB1R����?p��':��{�C�l�S��R��?!u��`��T���6M<��h}��-l��(�+>��d�i�����,�x!G�H�.*��k��|�j�zö�jZ��Qz>����
���5���DL���ZީE!�·W�6�}�ux��F��,v��E�����#���Ρ���hce~�;�X��{����P��i�m��o��{!������ֵSt���P�F�O��~fg~}|C�B�)�t�/���V�tdҳi���U���R��6&
��9Q�H�:���1i�i�� =�\w_�K�7(`t�p�Z�h�Q��&��󿫼fi��6�rri΋��b���"�
��[��rZ運��%�j��۴洞։���G��0L]"��X�E��M�<��ͧԍ6V��IS3у��ZB)�w��r�AW�U!��2e2��|:���':�l���ѣ�j�xiC�C���%1���w��w<@�h��R%#��w/v�蕿��J��:��Y�4��3�m[�9`�,��h�=j�VaFvl͍�F�.�ѣf�n��FU���3�J��`q�=�2(��M�P����b],ʅkD�Z�/�׮���-U��?�$.]�1�QG	t�b�QzE�+7����τ�1���Ð�����_j6nM	_��'���?"/�<�6e��Kt����ն��u�Ilݽ�_�����=jy�44S4o�D��-yG_�XML?��9F	K!�>�sm�Bi��N�`�ѣ�+�̥P-�X�W&��I'��X��酂��yJ�	���SC��=��G�m�h�H����r����g���i��!�.uMq�v�����|<�է�=j8�s5�6)@n���8������(��DMU��ԍ��d�d��+8�>��>�j���l�����w\6x*�Q3��(w5iz;�2F�4��<�f�x��`Ƥ���l+���h����Y�s��Ǝ��j	�T�hž��<��=$����۠�����)��� �:ھQ����0���/�?h�x�� �A]��iR�ㆳ���~�ټ0��n�U��g���</�Q��6:���)��\�o���m�N&
(���Xkd@i>�����S��������}�L�]w�\�����0��w�mW��VY�QQY	�U�2��s[�M�h�-���O>�&~��u�a�%�@6�h��B�f\����Yf]��KݭL��_��Fڅ��[CC-��^��f��Sy ��ē�O_��bq�<ʹ�X�"�Er�X�%�A,P����}�h�e+����f����sG�`�og֎�fr���s����d��)wF���N&C#�+����)�7�m1�aמ�kC�ڈ6�wh&f`��UYxF��]��]�i?��6���|��pWMM�D���m���F�Aj�¥���.o��͆��),+�����s�P���Lx܄��Lu�%P^�������U����2o?��h���ƞ���|�]_�~2w�LɾX���R�a�"["�2�F%����G�-�y�S��?5�\�w+m6��D&7��/��N��5�����%e�����uuY��=i��V:�K��j�^�D�E��_����,z��j�0�g��Ty�s=G���,�b��:Q�A����$�f�m��!�g�. �NتB�u�Zѓ��Q�HJ��n���H�&�8�Ⲅ�ק�/�}`�'��ܥ�	,�����5	 ����v//B��>-�+R+�!%���T��Ӈ׍�4�SA[!�X��,{�����d�m/���p����a>�������EOٌ�OT/���"�/���Q�=im�Zu��T��Aq�ש�IÃ�N�g>Le~Y���꼱�c37�q�O����U	��6��_?�n����

�U5iot�����J�F&L�Vəl*�~��-��܌��9�=i��:�z�����ޔ?dWZ�Cpl�w+�3�Ĥv|@d��@��Ǉ~b�h嫯Zx�lET�O�Zh��lc��O�l�7֖l��Q���(vye�w�W��}6�k*i���f'��91�=���d(Z��WJ�{���	>{I����l��;�|>�����a~�����}�#�gU ��LfA�,KM���B�;�8;uAq]�0�#o��+ǚ��b�[g�����7��w��#X�i�Jx�x嫍VO�����S1�o/�fj����DMzX�o�9w�_��6l��X:�nR��VF+����Vo6��^>��ᒂ[��=74ʏta ��i���-ҟV�>n�;��RDU^�Q�/���7X���ӳ�WcJaho�^V?�&���_    �r��Ĝ��s�9�Q��.krg���Iխ��x����O"l��>�&pk���s�\TT�mSe2]?=��q�3����Sݦ�M��
�60��v�¸�K�,�����r��
��WgP��K�Ԩ�$~s��ŉ��YuF-�o���=U��19�����k��S��y���d�
ӢS?
��L���1#�5﮻%���R���2җ-u_`�,F��+ �&��j�2ǯC��5��Z��oQ}���/l�+��D�`��$�2Zɧ�ܓ�(-���&��rl��i`��C=�3Zާ7�[�/6��[����[*�!����=ap��1��C� �Gm|��t[�F+����}H*��._��f�9�(F����`���dh�� t`��Ґ�0�?H@�P��
��
��!�=��ڼ�ԙ=?;��*�b6�n�wNm�!��S��4$C�>$dZx��9���\f,}bC�S�1�z݉�$��'��4|�o�1аU�#2:����(hfʇB�/�H�(@$_6Zi���vb*omLWE�e����J�7`�(pq�X�g����$���Y���O�$Wn i����{Zr��w��Č��(�
�mvn�}��z�]00Li毵M�Z�F�F@�Pc�DV�1���w�F0�g�:��Ŭ͒[��{y->�ɨ:�&��M�2E��[�����Ś�q5��m��ZB������
�iQkҺ
�z�����4{�����U�������h ����}���>#�y�p�?/����Y������c����w���E+ ��6R���ﯿ8��ɠ8�صG�T�o��X�d�A鵚5Z��>I�{��	�����[7z�^ "o�4�,�R�=Pn�M&��uR6_��m]�f�uX&8u�{��R=a��M���u:t�n�-�
�=�lH������%�M��)L>�}�z P��-y'ԥ��a���LB|� gq�}��8D����$ա ��
��� ྄!?v�QY��'�y�!��R%P{�M�J��k<�{S�	~V�f�ǰ���7ͽ��&tԓ��>���_�n�Olx�=�_U������.��WV�D��*��x��>ܞ�*���zP% ��݂�]�/�!�xvT�N]X�x��`]�G�
ٛ���8��kg� ޥ�T�砺��jЙ��m]Fz�O�Ե9�c۷�\�f
ҙ�� V���:��@�3n�������,�sc�wڬo{�J�p�:"[yx����Fg�ldgn ��s�%�76�N�N��,����������(;���ΗR�Lc1���:B_��T��@zR���go_�x������جQ5"��':��R,a';vCN03�$6� q�A�W�!@�A8V�Q|�O� =?��3�6�qMTq��C��Dh�kq�p�+�����AkfW�Z��UΓ�M>O3�J�R�)��8�Iȳ��ޕ�i�Z��$Gj�M�O�e&�����ߢ0�� �^��wzF[�e��-�ָ��o���Obqyz��A�]�P[�52�5�Tg�t�~%5xBE΢3��%��ѥ������<ix�b7�s�@X��C��꬧��w��~^�D��B���u�����n��t����W��_�Ch���?�Nkk��;�++�i��#��@��b$����8�/
Փ�|*Y��~���
Pn����(����J�w�}�jB������f�P-4ڛ�3��D�e"Ϝi|��[D,�,��f�r\�W�����n>�B�{�r� {��e��.l2�m �F��B+��e��b�S��Ų��P�S� Hqۼ�,=�ynՃ*�F�<�0�T/�4�8:tn���܌����"q	�A�����������VZ��0����� e�;�ʱ�p���0��2܆7�H���mF]C>'A��H�v�w��`UL��7���g�1Ru�'�O�xn}�F�-�?�2����A�:sR= Y��)�B9�\���5�P��鞅bnzB'.cd�n���<i"�y#;��=4�]�7iq�X	p~hE �:���\�'1_ư�U&��1�1�����Oڗ�Ru��]nm`�r�3g�qW_�&���Ė�Y�B��_g�-�xɷ����C� ��+H��9�ܲ:eyH9�B��/�z����>�<?�҇��y�SB�q��w�����m�ɱ-�$� ���L*��D�����&ѕ��T%#r�ʻs���ժv�+��D[/=d��#�����C�1��d����WǙ8�LՊ�,�r����γ�e��N\_U�����e�bjF:턯�MQg��,P�Y������\�p����V��ٺ���cE�/� l��]��6��t�1{C��ŔXo7�P���c�4�i�V�f��Z�����õ�a�Gj����}�2��۹u(������m��X聱�{=�g�^���W�S��b}��S��B���=� ��Y��m�Ԉ�vAо���V��@c�F#���φ��ɯ�C!�����c%aj�cE�t�����7$�}Tu�������3����@F*�%�uRx��0*��z`ݽ������%շ*9��o��Gx���1b\��=��:��h$nҤ�D��u��
�g��Bj9���ի��s��z�ϲC�3��Ƿ�ս�Ɠ
^��c<e5�`sq,�l�i�eMQ�{Z�H�Q?`4�H�U̓�;�I����
}�T��ٍ1�>�ᐕ��\��`� !R�+��>r�Ϧ.Z��T��b޲��FMR"LI)]##��O���ӡ�H@�L��e9ʲ(<Y��Kζ�q�y����qU�Z�T��;
A�%�c_��u��Sx��o��B�ߵ�_���0)��-��V�#%�Z�T��_Y�w�c�s�\s��p#&z=����29a'�	�2s��V�F%%�&`H�}���qf��"���<�%'ʳ�c�T��fF�m��is:���`�.XՌ�\9ڢ�����&"S%y)hFǕ���FcX�Jo��F�an�65K|��ud��m����S�f��$��g�w�u�g��U��f�xEa���������U)�{�մ"�yz�����Ow�٤����D~��ͯںE�j��CH���;���'�%F�
t��D��ҙ.Ⱦ�z�/s�	c��������_i�����j�t�)?�I��ғO�w�f*Q�|Z�4�w�D�_��'+��C>�S$�,�!~S�iZ�0p٧��-�׳�ZM�P}�Rq�8(G��������rg�͔��T5ީ��J@��_���B������Z��\��r��W廉�ځ&r�)��%���eZF����,�٧���m���NtZ���������I�#��%L��e�ޢ/�7c9e�qʻ'zR�a����7)���Ԙ�7�B
nnt�\f'��]���Jp�/���e_c�[�����`�hV�i4c���vk���k �G.�`B��n���*	�T+�N6�?�@s���@��l���{�w.��fj�r9�7��9��4��|D&�� �Y�lV���D��^��h���<a�����E�O��M޳���!��n�1]�J|��'�(�Րw�E+O������o&��%};�ۙrc�S���~:��
}=*�C����~���KnqNu6�6�T`�U���������d�2���xR��>C�1��s9FX^�t.�S��&��/<�Xm<g�D*S�/�W�y�T������##�L�<)1�0Ir)%L��+ �Z+���J��сo��=��BWl� :�ժGVvhe���0���`,p�.���5�f���h�7=��M�/%�CK���W4Qk��t�ڀ%�3kӐp���|�V�M�\0u�D�vyN
�r4来�Z	�r�\�+,v��Ɯ���A���	ؚ��-�vP�(^��%�p�ߑ��o ����_]��+�����������k�z�[���X�E��1�V� (z��wX
�n�%,m�'�Ma8��Lb��|\QU�z��tP�P��6���Fc���ù|�"���L�� ,  A�ϝ���F��a��``�o������V��M��������mx
)�i��.�P@F�c�X�AO�̌�j+�)�1$�?����:5�=�_���5T��i���]_���40N�`H�Xy�bԉ�/:��A�Y�&�_,u��_�G�z�^��k|ȿ�q_@�Z�H��U�j�1=tI��|����������q�w/�u�T��!j��!��R���pZ��`����$�h�D�,��dr��4��5��|���"�[3�S���'H��?�����:!��8L��wC��
]�<�����[�9�jl�@�Oݩ�������I�&��#_��D��\b'cz��l��H�4�i��f:�����xH�J�!��tQg�krS��b��GK�q�J֧�q�܋�#W�$�Ls��>)7L�0�_����MK���-5x��9�ٹu�Y��nQ������SW��D-�1�sYn���J$f/��x⩮��%��1	��%�6�fx�JZ��|̟\P����ՕZ���ɀGw�ل��w>�"o)�+&yt������=S���Rr�a�E�+M�Ye�A��l����D�E��Ŵ>��łDS�7���;�L�]��� �S���W����K[�%I}��9�nW�jQC�Vk��n����jWb�jġa�{'��
���/?�X>^������?��2���$�y/�r7�O��=soAxĿ�S��u�ϛ�i-�?T���2���ϼ[�`��^���܊.
�]�?��+:�+�b޹%#f�&�$-^���,q� (������C^�X+��\��MK���j-�s6���}���n�Y@87�{�&�F�[(56;�)�	f���M���N߿�z{��6��4e��� "�M�AY;:����C��$Itz� $0�y�>(ǯ��B+#���G �FG�CYj[ɕ.�G�������I<4���e�š�On��<��ڦ?� �Er�#f��n�в7�ނbE�~'�+�AMվw�DTdՀG��_5�$�y�����0ol��_[����$b���z=n�H���L�&Y�V�=��A��N�R�{\)k���#\Ӷ,���\�9�� �S�%_�I�ϡ�.Ռ��0�.+��q��2M��(���L��/��k����_�fL��Y
y���3�RN�K�s��7so0tY��#��,\��G��n^�/t�z�[861����{�c=�V˃ X�ӄ��`�S�x�Us�#�4�D����y��Vŏr(�r;�M�:�쑿p`�<�`c��{���-7:��B%3�5�������=TW�N\�GXc�}~V��/Wy:�j�G�L����H�{}r��ʹ�8U2��`�<�1���Go5��)��޲wT��{�*sk���Lak[��D�`�!�0�r?12�2�M0��;���g�7���TH��]%*��lX�Vs�(���c��[�=��}+H]m�(�/Ro�e&���4����\����hh�J�?����Ĺ�G^jR�Be)�Rh/��g��_��O&���ޔ���|����k �����L��X����J��.�*J�,+�@���9��"$1�n��@�{�Wߨ�������Ť�</~��RI[�'�4Z�涂`�*HI����)Yi\�[���!xޫ�^���#�k5Äѓ�*�8����#�r�o��7镄s\=�E����#�� ބC�5O�\]]����~6>h3 �,ǲBϿ�S�����<�
�'Y�d6��?���#{��_�S���6[��\��w�s*��-~���U�9��2�Sw|aw�KO9�����e	}���Bs��ΙXXԌ�;�A��)��Ռƛ2;�\,��G���]�N����8�m;������UTΝ!Vi��D�ĭ�Y�W�*�$ui�Ǿ��5�d;���]9|���T^�և�?$��������T��m���oZ�PN#����FH��i
-B�[ 2Z]o����	]�f��S��^d���[�[�~�)��䭤��o�R��&����p��"i��>j�%�ǙM��߶E~�D�D�T�)��z`���xDw�%�3�GC3���+�>�Z��/�(���;      #   m   x�U��1D�3�",��L�Z��%��KO�t,_��z����5D���%�#�G��Jn21p'��*�E����$q^�FIB�a}^���97Qs���z��8�(c      *      x������ � �      +      x������ � �     